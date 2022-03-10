<?php

namespace App\Http\Controllers;

use URL;
use Session;
use Sentinel;
use stdClass;
use Exception;
use App\Models\Job;
use App\Models\User;
use App\Http\Requests;
use App\Models\Category;
use App\Traits\GmapTrait;
use App\Traits\TwilioTrait;
use App\Models\SubCategory;
use App\Models\UserDetails;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Aws\Sns\Exception\NotFoundException;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel as FacadesSentinel;

class JobController extends Controller
{
    use GmapTrait, TwilioTrait;

    public function __construct() {   
        $this->middleware('auth', ['only' => ['getIndex', 'data', 'destroy', 'discardPost', 'beforePost']]);
    }

    public function getIndex() {
        return view('admin.jobs.index');
    }
    public function data() {
        $job = Job::whereNull('jobs.deleted_at')
            ->leftJoin('users', 'users.id', '=', 'jobs.owner_id')
            ->select(['jobs.id', 'users.first_name', 'jobs.title', 'jobs.description', 'jobs.created_at'])
            ->get();

        return Datatables::of($job)
            // ->addIndexColumn()
            ->editColumn('description', function ($job) {
                return Str::limit($job->description, 50);
            })
            ->editColumn('created_at','{{ $created_at->diffForHumans() }}')
            ->add_column('actions',
                '<a href="{{ route(\'preview/job\', $id) }}"><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Info Job"></i></a>
                 <a href="{{ route(\'confirm-delete/job\', $id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="Delete Job"></i></a>
                ')
            ->make(true);
    }
    public function post_job(Request $request) {
        if(URL::previous() == URL::to('login') && $request->session()->has('jobPost')) {
            $sub_categories = SubCategory::where('status', '=', 1)->get();
            return view('site.wizard.index', compact('sub_categories'));
        } else {
            if($request->categoryName == null) {
                return redirect()->back()->with(['message' => 'Select Service you want.']);
            } elseif($request->categoryName) {
                try{
                    $reqCat = Category::where('name', $request->categoryName)->firstOrFail();
                    // $categories = Category::where('status', '=', 1)->get();
                    $sub_categories = SubCategory::where('category_id', $reqCat->id)
                            ->where('status', '=', 1)->get();
    
                    return view('site.wizard.index', compact('sub_categories', 'reqCat'));
                } catch(Exception $e) {
                    return back()->with(['message' => 'Service not found.']);
                }
            }
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
        return $response;
    }
    public function postCreate(Request $request) {
        
        if($request->session()->has('jobPost') == null) {
            $request_decode = json_decode($request->all()['data']);
            $response = $this->cURL(str_replace(" ", "", $request_decode->job_postcode));
            $response = json_decode($response);
            if($response->code == 2000) {
                $request_decode->location = ucfirst($response->result[0]->post_town);
                $request_decode->lat = $response->result[0]->latitude;
                $request_decode->lng = $response->result[0]->longitude;
            } else {
                if($request_decode->submit == 'Need to login') {
                    return response()->json(['locationCode' => 200-3,'statusCode' => $response->status, 'message' => $response->error]);
                } else {
                    return response()->json(['locationCode' => 200-2,'statusCode' => $response->status, 'message' => $response->error]);
                }
            }
        }
        
        if($request || session()->has('jobPost')) {
            if(Sentinel::check() && $request->is('post-a-job')) {   
                $user = Sentinel::getUser();

                if($user->roles[0]->slug == 'homeowner') {
                    $record = Job::create([
                        'owner_id'          => $user->id,
                        'sub_category_id'   => $request_decode->subcategory,
                        'title'             => $request_decode->job_title,
                        'term_condition'    => 1,
                        'description'       => $request_decode->job_description,
                        'reference_number'  => str_random(10),
                        'publish'           => 1,
                        'postcode'          => $request_decode->job_postcode,
                        'location'          => $request_decode->location,
                        'lat'               => $request_decode->lat,
                        'lng'               => $request_decode->lng,
                    ]);
                    $this->getNotify($record);
                    session()->flash('success', 'Your job has been posted.');
                    return response()->json(['locationCode' => 200-2 ,'statusCode' => $response->code]);
                } else {
                    return abort(403);
                }
    
            } elseif(Sentinel::check() && session()->has('jobPost')) {
                $user = Sentinel::getUser();
                if(is_string(session()->get('jobPost')->subcategory)) {
                    session()->get('jobPost')->subcategory = SubCategory::where('name', session()->get('jobPost')->subcategory)->first()->id;
                }
                $publish = 1;

                if($user->roles[0]->slug == 'homeowner') {
                    $owner_id = Sentinel::getUser()->id;
                    $record = Job::create([
                        'owner_id'          => $owner_id,
                        'sub_category_id'   => session()->get('jobPost')->subcategory,
                        'title'             => session()->get('jobPost')->job_title,
                        'term_condition'    => 1,
                        'description'       => session()->get('jobPost')->job_description,
                        'reference_number'  => str_random(10),
                        'publish'           => $publish,
                        'postcode'          => session()->get('jobPost')->job_postcode,
                        'location'          => session()->get('jobPost')->location,
                        'lat'               => session()->get('jobPost')->lat,
                        'lng'               => session()->get('jobPost')->lng,
                    ]);
                    
                    $this->getNotify($record);
                    if($publish == 1){
                        return Redirect::route('client-dashboard')->with('success' , 'Your job has been posted.');
                    } else {
                        return Redirect::route('client-dashboard')->with('warning' , 'Your job post is saved on your dashboard but not visible for tradespeople.');
                    }
                } else {
                    session()->forget('jobPost');
                    return Redirect::route('client-dashboard')->with('error', "You can't post a job, only <strong>Homeowner</strong> have right to post a job.");
                }
                
            } else {
                if($request_decode) {
                    session()->put('jobPost', $request_decode);
                    session()->flash('info', 'login or register to post a job.');
                    return response()->json(['locationCode' => 200-3, 'statusCode' => $response->code]);
                }
            }

            session()->has('jobPost') ? session()->forget('jobPost') : '';
            return redirect()->route('home');
        }
    }
    public function preview(Request $request, $id) {
        try {
            $job = Job::findOrFail($id);
            $category_id = SubCategory::where('id','=', $job->sub_category_id)->first()->category_id;
            $job->category_name = Category::where('id','=', $category_id)->first()->name;
            $job->sub_category_id = SubCategory::where('id','=', $job->sub_category_id)->first()->name;

            return view('site.liveleads.preview', compact('job'));
        } catch(ModelNotFoundException $execption) {
            return abort(404, 'Resource not found');
        }
    }
    public function getAllJob(Request $request){
        if($request->ajax()){
            if(Sentinel::check()){
                $user = Sentinel::getUser();
                $coords = isset($user->gdata->coordinates) ? $user->gdata->coordinates : null ;
                
                if($user->roles[0]->slug == 'tradeperson') {
                    if($user->accountSetting) {
                        $services = json_decode($user->accountSetting->services);
                        if($services != null && $coords != null) {
                            $records = Job::where('publish', 1)
                                ->whereNull('jobs.deleted_at')
                                ->leftJoin('sub_categories', 'jobs.sub_category_id', '=', 'sub_categories.id')
                                ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
                                ->select('jobs.*', 'sub_categories.name')
                                ->whereNotIn('jobs.id',function($q2) {
                                    $q2->select('job_id')->from('user_leads');
                                })->whereNotIn('jobs.id',function($q3) {
                                    $q3->select('job_id')->from('user_reaction');
                                });
                            $jobs = $records->get();
                            return response()->json(['user' => 'isTrader', 'jobs' => $jobs, 'u_id' => $user->id, 'coords' => $coords]);
                        }
                    }
                } else {
                    return response()->json(['user' => 'isNTrader']);
                }
            } else {
                return response()->json(['user' => 'guest']);
            }
        }
    }
    public function destroy(Request $request) {

        $user = Sentinel::getUser();
        if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug == 'homeowner') {
            $jobId = collect()->toArray();
            foreach($user->jobs as $jobs) {
                $jobId[] = $jobs->id;
            }
            if(in_array((int)$request->job_id, $jobId)) {
                try{
                    $job = Job::findOrFail($request->job_id);
                    $job->delete();
    
                    return Redirect::back()->with('success', 'Post delete successfully.');
                } catch(\Execption $execption) {
                    throw new Execption('Job not found.');
                }
            }
            return Redirect::back()->with('error', 'Resources not found.');
        }
    }
    public function discardPost(Request $request) {
        if(Sentinel::check()){
            if($request->session()->has('jobPost')) {
                $request->session()->forget('PostJob');
                return Redirect::route('client-dashboard')->with('info', "Job discard successfully, want to post new job");
            }
        } else {
            Sentinel::logout();
            return Redirect::route('client-login')->with('error', 'Need to login again.');
        }
    }
    public function beforePost(Request $request) {
        
        if(Sentinel::check() && session()->has('jobPost')){

            $postData = session()->get('jobPost');

            $sub_category = SubCategory::find(session()->get('jobPost')->subcategory)->name;
            $category = Category::find(session()->get('jobPost')->subcategory)->name;
            $postData->subcategory = $sub_category;
            $postData->category = $category;

            return view('site.wizard.postData', compact('postData'));
        }
    }
    public function getModalDelete(Job $job) {
        $model = 'jobs';
        $confirm_route = $error = null;
        try {
            $confirm_route =  route('delete/job',['id'=>$job->id]);
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (GroupNotFoundException $e) {

            $error = trans('testimonial/message.error.delete', compact('id'));
            return View('admin/layouts/modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }
    public function getDelete(Job $job) {
        $job->delete();
        return redirect('administrator/job');
    }
    
    
    public function getNotify($job) {
        
        $users = User::whereNotNull('email_verified_at')
            ->whereHas('roles', function ($q) {
                $q->where('role_id', 3);
            })->whereHas('gdata', function ($q) {
                $q->whereNotNull('coordinates');
            })->whereHas('account_setting', function ($q) {
                $q->whereNotNull('services');
            })->get();
            
        $job_coords = [$job->lat, $job->lng];
        $category = SubCategory::where('id', $job->sub_category_id)->with('Associated_Category')->first();
            
        $filter_users = [];
        $responses = [];
        foreach($users as $user) {
            $user_services = json_decode($user->account_setting->services);
            if(array_search($category->Associated_Category->name, $user_services, true) !== false) {
                if($this->sentNotificationToTradeperson($job_coords, json_decode($user->gdata->coordinates))) {
                    array_push($filter_users, $user->email);
                    //Notify User
                    if($user->notificationToken && $user->notification_allowed == 1) {
                        $payload = array(
                            'to' => $user->notificationToken,
                            'sound' => 'default',
                            'body' => 'A new Job posted.',
                            'channelId' => 'default'
                        );
                        
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_SSL_VERIFYHOST =>  0,
                            CURLOPT_SSL_VERIFYHOST =>  0,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => json_encode($payload),
                            CURLOPT_HTTPHEADER => array(
                                "Accept: application/json",
                                "Accept-Encoding: gzip, deflate",
                                "Content-Type: application/json",
                                "cache-control: no-cache",
                                "host: exp.host"
                            ),
                        ));
                        
                        $response = curl_exec($curl);
                        $err = curl_error($curl);
                        
                        array_push($responses, $response);
                        
                        curl_close($curl);
                    }
                    
                    
            //         // Send Message Notification
            //         // Send Email Notification
            //         if($user->email_allowed && $user->email_allowed == 1) {
            //             Mail::send('emails.notifications.new_job', compact('user'), function ($m) use ($user){
            //                 $m->to($user->email, $user->first_name)->subject('New Job Notification');
            //             });
            //         }
            //         // String User full number
            //         if($user->sms_allowed && $user->sms_allowed == 1) {
            //             try {
            //                 $this->sendMsgThroughTwilio($user->userDetails->country_code.$user->userDetails->phone);
            //             } catch (\Exception $e) {
            //                 // return $e->getMessage();
            //             }
            //         }
            //         //end Notify user
                }
            }
        }
        $obj = new stdClass;
        $obj->filter_users = $filter_users;
        $obj->responses = $responses;
        
        return $obj;
    }
    
}