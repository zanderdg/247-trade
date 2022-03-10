<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use stdClass;
use DateTime;
use Sentinel;
use App\Models\GoogleData;
use App\Http\Requests;
use Twilio\Rest\Client;
use App\Models\Countries;
use App\Models\UserDetails;
use App\Traits\TwilioTrait;
use Illuminate\Http\Request;
use libphonenumber\PhoneNumberType;
use libphonenumber\PhoneNumberUtil;
use App\Http\Controllers\Controller;
use libphonenumber\PhoneNumberFormat;
use Twilio\Exceptions\TwilioException;
use Illuminate\Support\Facades\Redirect;
use libphonenumber\NumberParseException;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProfileRequest;
use libphonenumber\PhoneNumberToCarrierMapper;
use libphonenumber\PhoneNumberToTimeZonesMapper;
use function GuzzleHttp\json_encode;

class ProfileController extends Controller {

    use TwilioTrait;

    public function __construct() {
        $this->middleware('auth', ['only' => ['index', 'userData', 'getEdit', 'postEdit', 'updateAvatar']]);
    }

    public function index() {
        if (Sentinel::check()) {
            $user = Sentinel::getUser();
            if ($user->roles[0]->slug == 'tradeperson') {
                if (isset($user->accountSetting)) {
                    $user->services = json_decode($user->accountSetting->services);
                }
                foreach ($user->reviews as $key => $review) {
                    $user->reviews[$key]->homeowner_id = User::find($review->homeowner_id);
                }
            }
            return view('site.profile.index', compact('user'));
        } else {
            return Redirect::route('client-profile');
        }
    }
    public function userData(Request $request) {
        if ($request->ajax()) {
            if (Sentinel::check()) {
                $user = Sentinel::getUser();
                if ($user->roles[0]->slug == 'tradeperson') {
                    $newUser = new stdClass;
                    $newUser->id = $user->id;
                    $newUser->lat = $user->userDetails->lat ? $user->userDetails->lat : null;
                    $newUser->lng = $user->userDetails->lng ? $user->userDetails->lng : null;
                    $newUser->coordinates = isset($user->gdata->coordinates) ? $user->gdata->coordinates : null;
                    
                    if ($user->accountSetting) {
                        $services = json_decode($user->accountSetting->services);
                        if ($services != null) {
                            $jobs = Job::where('publish', 1)
                                ->leftJoin('sub_categories', 'jobs.sub_category_id', '=', 'sub_categories.id')
                                ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
                                ->where(function ($q1) use ($services) {
                                    foreach ($services as $service) {
                                        $q1->orWhere('categories.name', '=', $service);
                                    }
                                })
                                ->whereNOTIn('jobs.id',function($q2){
                                    $q2->select('job_id')->from('user_leads');
                                })
                                ->select('jobs.*', 'sub_categories.name')                             
                                ->get();

                            $newUser->jobs = $jobs;
                        }
                    }
                    $data = json_encode($newUser);
                    return response()->json($data);
                } else {
                    return response()->json(['user' => 'guest']);
                }
            }
        }
    }
    public function getEdit($id) {
        if (Sentinel::check()) {
            $user = User::find($id);
            if ($user->roles[0]->slug == 'tradeperson') {
                if (isset($user->accountSetting)) {
                    $user->services = json_decode($user->accountSetting->services);
                }
            }
            $countries = Countries::all();
            return view('site.profile.edit', compact('user', 'countries'));
        } else {
            return Redirect::route('client-login');
        }
    }
    
    public function cURL($postcode) {

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.ideal-postcodes.co.uk/v1/postcodes/'.$postcode.'?api_key=ak_ktdehaleHCPl0lnR2s2nvVvrL800N',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
        return $response;
    }
    public function postEdit(UpdateProfileRequest $request, $id) {

        $response = $this->cURL(str_replace(" ", "", $request->postal));
        if($response->code !== 2000) return redirect()->back()->with('error', $response->error);

        if (Sentinel::check()) {
            try {
                $user = User::findOrFail($id);
                if ($request->fname || $request->lname) {
                    User::where('id', $id)->update([
                        'first_name'        => $request->fname,
                        'last_name'         => $request->lname
                    ]);
                }
                UserDetails::where('u_id', $user->id)->update([
                    'bio'           => $request->bio,
                    'dob'           => $request->dob,
                    'gender'        => $request->gender,
                    'country'       => $request->country,
                    'state'         => $request->state,
                    'city'          => $request->city,
                    'address'       => $request->address ? $request->address : null,
                    'postal'        => $response->result[0]->postcode,
                    'lat'           => $response->result[0]->latitude ? $response->result[0]->latitude : null,
                    'lng'           => $response->result[0]->longitude ? $response->result[0]->longitude : null
                ]);

                // if ($user->roles[0]->slug == 'homeowner') {
                //     if ($request->address && $postal->postcode && $postal->latitude && $postal->longitude) {
                //         foreach ($user->jobs as $job) {
                //             if ($job->publish == 0) {
                //                 Job::where('id', $job->id)->update(['publish' => 1]);
                //             }
                //         }
                //     } else {
                //         foreach ($user->jobs as $job) {
                //             if ($job->publish == 1) {
                //                 Job::where('id', $job->id)->update(['publish' => 0]);
                //             }
                //         }
                //     }
                // }

                GoogleData::where('user_id', $user->id)->update([
                    'coordinates'   => null
                ]);

                return Redirect::route('client-profile')->with('success', 'Your profile has been updated successfully.');
            } catch (ModelNotFoundException $exception) {
                return $exception;
            }
        }
    }
    public function Emailverified($user_token) {
        $user = User::where('verify_token', '=', $user_token)->first();
        if ($user == null) abort(410);
        if (isset($user->verify_token) && $user->email_verified_at == null) {
            $countries = Countries::all();
            return view('site.verificaition', compact('user', 'countries'));
        }
        return Redirect::route('client-login');
    }

    public function updateAvatar(Request $request) {
        if (Sentinel::check()) {
            if ($request->ajax()) {
                $data = $request->data;
                if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
                    $data = substr($data, strpos($data, ',') + 1);
                    $type = strtolower($type[1]); // jpg, png, gif

                    if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                        throw new \Exception('invalid image type');
                    }
                    $data = str_replace(' ', '+', $data);
                    $data = base64_decode($data);

                    if ($data === false) {
                        throw new \Exception('Invalid image.');
                    }
                } else {
                    throw new \Exception('Invalid image.');
                    // throw new \Exception('did not match data URI with image data');
                }
                $imaga_name_with_ext = time() . '.' . $type;
                file_put_contents('./assets/uploads/profilesImage/' . $imaga_name_with_ext, $data);
                UserDetails::where('u_id', $request->id)->update([
                    'picture'       => $imaga_name_with_ext,
                ]);

                return response()->json(['success' => 'Profile Image update successfully.']);
            }
        }
    }

    protected function numberValidationForUK(array $request) {

        $numbervalue = isset($request['full_number']) ? $request['full_number'] : $request['number_input_field'];
        $numberLength = isset($request['full_number']) ? strlen($request['full_number']) : strlen($request['number_input_field']);

        switch ($numberLength) {
            case 14:
                $nationalNumberValue = substr($numbervalue, 4);
                return $nationalNumberValue;
                break;
            case 13:
                $nationalNumberValue = substr($numbervalue, 3);
                return $nationalNumberValue;
                break;
            case 11:
                $nationalNumberValue = substr($numbervalue, 1);
                return $nationalNumberValue;
                break;
            default:
                $nationalNumberValue = $numbervalue;
                return $nationalNumberValue;
                break;
        }
    }
    public function checkNumber(Request $request) {

        if ($request->ajax()) {
            $numberOnly = $this->numberValidationForUK($request->all());
            $is_uniqueNumber = UserDetails::where('phone', '=', $numberOnly)->first();
            if ($is_uniqueNumber == null) {
                try {
                    $response = $this->NumberValidation($request->number, $request->country);
                    if ($response['isValidNumber'] == true && $response['isValidNumberForRegion'] == true && $response['carrierName'] !== null) {
                        $data = [
                            'phone_number'    => $response['E164_Formatter'],
                            'via'       => 'sms',
                        ];

                        $twilioResponse = $this->startVerification($data);
                        // dd( $data, $twilioResponse);
                        if ($twilioResponse->status == 'pending') {
                            return response()->json(['number' => $twilioResponse->to, 'success' => 'Code has been sent to your number.']);
                        } else {
                            // dd('we are here.');
                            return response()->json(['errors' => 'Plesae check your number.']);
                        }
                    } else {
                        return response()->json(['errors' => "Please check the number."]);
                    }
                } catch (\Exception $exception) {
                    dd($exception->getMessage());
                    // return response()->json(['errors' => "Problem with input's, Please check the number or select country."]);
                }
            } else {
                return response()->json(['errors' => 'Number is allready in used.']);
            }
        }
    }
    public function resendCode(Request $request) {

        if ($request->ajax()) {
            $data = [
                'phone_number'    => $request->full_number,
                'via'       => 'sms',
            ];

            $twilioResponse = $this->startVerification($data);
            if ($twilioResponse->status == 'pending') {
                return response()->json(['number' => $twilioResponse->to, 'success' => 'Code has been sent to your number.']);
            } else {
                return response()->json(['errors' => 'Try after 12 hour.']);
            }
        }
    }

    // public function ihaveAcode(Request $request){

        //     if($request->ajax()){
        //         try {
        //             UserDetails::where('phone', '=', $request->number)->first();
        //             return response()->json(['errors' => 'Number is allready in used.']);
        //         } catch(Execption $exception){
        //             try {
        //                 $response = $this->NumberValidation($request->number, $request->country);
        //                 if($response['isValidNumber'] == true && $response['isValidNumberForRegion'] == true && $response['carrierName'] !== null){
        //                     $this->verifyToken($request->all());
        //                     $db_response = UserDetails::where('u_id', Sentinel::getUser()->id)->update([
        //                         'service_sid' => $verification_check->serviceSid,
        //                         'twilio_status' => $verification_check->status,
        //                         'via' => $verification_check->channel,
        //                         'phone' => $verification_check->to,
        //                     ]);
        //                     dd($db_response);
        //                 } else {
        //                     dd($response);
        //                 }
        //             } catch(Execption $exception) {
        //                 dd($exception);
        //             }
        //         }            
        //     }
    // }

    public function verifyCode(Request $request) {

        if ($request->ajax()) {
            $NumberUK = $this->numberValidationForUK($request->all());
            try {
                $twilioResponse = $this->verifyToken($request->all());
                if ($twilioResponse->status == "pending" && $twilioResponse->valid == false) {
                    return response()->json(['errors' => 'Please enter valid verification code.']);
                } elseif ($twilioResponse->status == "approved" && $twilioResponse->valid == true) {
                    !$request->token ? $user = User::where('id', Sentinel::getUser()->id)->first() : $user = User::where('verify_token', $request->token)->first();
                    $full_number = $user->userDetails->country_code . $user->userDetails->phone;
                    if ($full_number != $twilioResponse->to) {
                        UserDetails::where('u_id', $user->id)->update([
                            'service_sid' => $twilioResponse->serviceSid,
                            'twilio_status' => $twilioResponse->status,
                            'via' => $twilioResponse->channel,
                            'country_code' => $request->country_code,
                            'phone' => $NumberUK,
                        ]);

                        User::where('id', $user->id)->update([
                            'verify_token'          => null,
                            'email_verified_at'     => date('Y-m-d H:i:s'),
                        ]);
                    } else {
                        UserDetails::where('u_id', $user->id)->update([
                            'twilio_status' => $twilioResponse->status,
                        ]);

                        return response()->json(['success' => 'You number is successfully verified.']);
                    }

                    return response()->json(['success' => 'You number is successfully updated.']);
                } else {
                    dd('inside else');
                }
            } catch (Execption $execption) {
                return response()->json(['errors' => 'There is some problem with number verification.']);
            }
        }
    }

    public function GuestProfileView($id) {
        try {
            $user = User::findOrFail($id);
            if ($user->roles[0]->slug == 'tradeperson') {
                foreach ($user->reviews as $key => $review) {
                    $user->reviews[$key]->homeowner_id = User::find($review->homeowner_id);
                }
                return view('site.tradepeople.guest.index', compact('user'));
            } else {
                return redirect()->back()->with('error', 'User not exist, Contact to admin.');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->prev()->with('error', $e);
        }
    }    

}
