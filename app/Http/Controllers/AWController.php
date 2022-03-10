<?php 

namespace App\Http\Controllers;

use DB;
use PDF;
use URL;
use Auth;
use File;
use Hash;
use Lang;
use View;
use Input;
use Stripe;
use App\Models\Faq;
use App\Models\Job;
use Session;
use App\Models\Page;
use App\Models\Role;
use App\Models\User;
use Reminder;
use Sentinel;
use Exception;
use Validator;
use App\Models\Slider;
use App\Models\Category;
use App\Models\MenuLink;
use GoogleSearch;
use App\Models\SiteSetting;
use App\Models\SubCategory;
use App\Models\Testimonial;
use App\Models\Client;
use App\Traits\TwilioTrait;
use App\Traits\GmapTrait;
use App\Models\GoogleData;
use App\Models\UserReaction;
use App\Models\AccountSetting;
use App\Models\ClientData;
use App\Models\UserDetails;
use App\Jobs\Job as JobsJob;
use Illuminate\Http\Request;
use App\Traits\CategoryTrait;
use App\Models\ClientInvoices;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AWController extends Controller {

    use CategoryTrait, GmapTrait, TwilioTrait;

	/**
	* Crop Demo
	*/
	public function crop_demo() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$targ_w = $targ_h = 150;
			$jpeg_quality = 99;

			$src = base_path().'/public/assets/img/cropping-image.jpg';
		//dd($src);
			$img_r = imagecreatefromjpeg($src);

			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,intval($_POST['x']),intval($_POST['y']), $targ_w,$targ_h, intval($_POST['w']),intval($_POST['h']));

			header('Content-type: image/jpeg');
			imagejpeg($dst_r,null,$jpeg_quality);

			exit;
		}
	}

	/**
     * Message bag.
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $messageBag = null;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->messageBag = new MessageBag;
    }
    
    public function showHome() {
    	if(Sentinel::check())
			return View('admin/index');
		else
			return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
    }
    public function showView($name=null) {
    	if(View::exists('admin/'.$name)) {
			if(Sentinel::check())
				return View('admin/'.$name);
			else
				return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
		}
		else {
			return View('admin/404');
		}
    }
    public function postAPIclientRegister() {
        // print_r(Input::get());
        $rules = array(
            'family_name'      => 'required|min:1',
            'first_name'       => 'required|min:1',
            'last_name'        => 'required|min:1',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:8|between:3,32|regex:/^(?=.*[A-Z]).+$/',
            'password_confirm' => 'required|min:8|same:password',            
            'phone'            => 'required|numeric',
            'gender'           => 'required',
            'dob'              => 'required',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            // return Redirect::back()->withInput()->withErrors($validator);
            // print_r($validator->errors());
            return response()->json([$validator->errors()]);
        }

       
        //check whether use should be activated by default or not
        // veification link in email to be sent to user
        $fm_name = Input::get('family_name');
        $fi_name = Input::get('first_name');
        $client_number = mb_substr($fm_name, 0, 2).mb_substr($fi_name, 0, 2).rand(pow(10, 4-1), pow(10, 4)-1);
        $activate = true;
        $time = time();
        try {
            
            // Register the user
            $user = Sentinel::register(array(
                'family_name'=> Input::get('family_name'),
                'first_name' => Input::get('first_name'),
                'last_name'  => Input::get('last_name'),
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
   
            ),$activate);

            $rem = array(
                'u_id'   => $user->id,
                'dob'   => Input::get('dob'),
                'client_number' => $client_number,
                // 'bio'   => Input::get('bio'),
                // 'picture'   => isset($safeName)?$safeName:'',
                'gender'   => Input::get('gender'),
                // 'country'   => Input::get('country'),
                // 'state'   => Input::get('state'),
                //  'city'   => str_replace('"', "", Input::get('city')),
                //  'address'   => Input::get('address'),
                //  'zipcode'   => Input::get('postal'),
                'phone'   => Input::get('phone'),
                'client_folder_time'    => $time
                // 'is_free'   => 0
            );

            $Client = new Client($rem);

            $Client->save();
            $path = base_path().'/uploads/source/' . $client_number.'_'.$time;
            File::makeDirectory($path, $mode = 0777, true, true);
            
            return response()->json(['success'=> "You are registered successfully. Please check your email to verify your account."]);
            // return Redirect::route("client-registration")->with('success', "You are registered successfully. Please check your email to verify your account.");
            

        } catch (LoginRequiredException $e) {
            $error = Lang::get('admin/members/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('admin/members/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = Lang::get('admin/members/message.user_exists');
        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            $error = Lang::get('auth/message.account_not_activated');
        } 

        // Redirect to the user creation page
        return response()->json(['error'=> $error]);
        // return Redirect::back()->withInput()->with('error', $error);
    }
    public function postAPIClientLogin() {
        // print_r(Input::get());

        // Declare the rules for the form validation
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|between:3,32',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            // return back()->withInput()->withErrors($validator);
            return response()->json([$validator->errors()]);
        }

        try {
            // Try to log the user in
            if(Sentinel::authenticate(Input::only('email', 'password'), Input::get('remember-me', false)))
            {   
                $userdata = Sentinel::authenticate(Input::only('email', 'password'), Input::get('remember-me', false));
                // print_r($use->id);
                
                // return Redirect::route('client-dashboard');
                return response()->json(['user_id'=> $userdata->id]);
                    
            }

            $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));

        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended', compact('delay' )));
        }

        // Ooops.. something went wrong
        return response()->json(['error'=>$this->messageBag]);

        // return Redirect::route("client-login")->withInput()->withErrors($this->messageBag);
    }   
    public function getAPIclientLogout() {
        // Log the user out
        Sentinel::logout();

        // Redirect to the users page
        return response()->json(['success'=>'You have successfully logged out!']);
        // return Redirect::to('client-login')->with('success', 'You have successfully logged out!');
    }
    public function getAPIIncome() {
        $all_incomes  = DB::select('select distinct * from income where income_status=1');
        return response()->json([$all_incomes]);
    }

    public function getAPIExpensesCat1() {
        
        $all_expenses1 = DB::select('select distinct * from expense where expense_status=1 and ec_id = 1');
        return response()->json([$all_expenses1]);
    }
    public function getAPIExpensesCat2() {
        
        $all_expenses2 = DB::select('select distinct * from expense where expense_status=1 and ec_id = 2');
        return response()->json([$all_expenses2]);
    }
    public function getAPIExpensesCat3() {
        
        $all_expenses3 = DB::select('select distinct * from expense where expense_status=1 and ec_id = 3');
        return response()->json([$all_expenses3]);
    }

    public function getAPIUserByID($id = null) {

        // echo $id;
        // Get the user information
        if($user = Sentinel::findById($id))

        {$user = User::where('id', $id)->with('client')->first();

            // print_r($user);
            // Get this user groups
            //$userRoles = $user->getRoles()->lists('name', 'id')->all();

            // Get a list of all the available groups
            //$roles = Sentinel::getRoleRepository()->all();
            return response()->json(['user'=> $user]);

        }
        else
        {
            // Prepare the error message
            $error = Lang::get('members/message.member_not_found', compact('id'));

            // Redirect to the user management page
            return response()->json(['error'=> $error]);
            // return Redirect::route('members')->with('error', $error);
        }
    }
    public function postAPICardDetailsForToken(){

        // print_r(Input::get());
        // exit;
        if(null !== (Input::get('card_number'))){
            $card_name      = Input::get('card_name');
            $card_number    = Input::get('card_number');
            $card_cvv       = Input::get('card_cvv');
            $card_month     = Input::get('card_month');
            $card_year      = Input::get('card_year');

            
            
            try{
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $tr = Stripe\Token::create ([
                  'card' => [
                    'name'      => $card_name,
                    'number'    => $card_number,
                    'exp_month' => $card_month,
                    'exp_year'  => $card_year,
                    'cvc'       => $card_cvv,
                  ],
                ]);
                // print_r($tr);
                // echo $orderid = $tr['id'];
                return response()->json(['token'=> $tr['id']]);

            }
            catch(\Stripe\Exception\CardException $e) {
                // echo $error1 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (\Stripe\Exception\InvalidRequestException $e) {
                // Invalid parameters were supplied to Stripe's API
                // echo $error2 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (\Stripe\Exception\AuthenticationException $e) {
                // Authentication with Stripe's API failed
                // echo $error3 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (\Stripe\Exception\ApiConnectionException $e) {
                // Network communication with Stripe failed
                // echo $error4 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (\Stripe\Exception\Error $e) {
                // Display a very generic error to the user, and maybe send
                // yourself an email
                // echo $error5 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe
                // echo $error6 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            }
            // if($tr['status'] == 'succeeded'){
            //     // $orderid = $tr['id'];
            //     // print_r($tr);
            //     // return response()->json(['transaction_id'=> $orderid]);
            // }else{
            //     return response()->json(['error'=> 'error on processing your request']);
            // }
        }else{
            return response()->json(['error'=> 'invalid amount']);
        }
    }
    public function postAPIPayment(){
        // print_r(Input::get('amount'));
        if(null !== (Input::get('amount'))){

            $total_fn_fees = Input::get('amount');
            $stripeToken = Input::get('stripeToken');

            try{
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $tr = Stripe\Charge::create ([
                        "amount" => $total_fn_fees * 100,
                        "currency" => "usd",
                        "source" => $stripeToken,
                        "description" => "Test payment from gst" 
                ]);
                $orderid = $tr['id'];
                $trstatus = $tr['status'];

                // print_r($tr);
                return response()->json(['transaction_id'=> $orderid, 'transaction_status'=> $trstatus, 'full_response'=> $tr]);
            }
            catch(\Stripe\Exception\CardException $e) {
                // echo $error1 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (\Stripe\Exception\InvalidRequestException $e) {
                // Invalid parameters were supplied to Stripe's API
                // echo $error2 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (\Stripe\Exception\AuthenticationException $e) {
                // Authentication with Stripe's API failed
                // echo $error3 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (\Stripe\Exception\ApiConnectionException $e) {
                // Network communication with Stripe failed
                // echo $error4 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (\Stripe\Exception\Error $e) {
                // Display a very generic error to the user, and maybe send
                // yourself an email
                // echo $error5 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe
                // echo $error6 = $e->getMessage();
                return response()->json(['error'=> $e->getMessage()]);

            }
            // if($tr['status'] == 'succeeded'){
            //     $orderid = $tr['id'];
            //     return response()->json(['transaction_id'=> $orderid]);
            // }else{
            //     return response()->json(['error'=> 'error on processing your request']);
            // }
        }else{
            return response()->json(['error'=> 'invalid amount']);
        }
    }
    public function postAPISubmitRecords(){
        
        // print_r(Input::get());
        // exit;
        try{
            $substype = Input::get('substype');
                // echo '<br>';
                // $substype_fees = Input::get('substype_fees');

                // if($substype == 1){
                //     // $substype_fees = request()->session()->get('substype_fees');
                //     $discount_fees = 4;
                //     $total_fn_fees = $substype_fees - 4;
                // }elseif($substype == 2){
                //     // $substype_fees = request()->session()->get('substype_fees'); 
                //     $discount_fees = 20;
                //     $total_fn_fees = $substype_fees - 20;
                // }elseif($substype == 3){
                //     // $substype_fees = request()->session()->get('substype_fees'); 
                //     $discount_fees = 25;
                //     $total_fn_fees = $substype_fees - 25;
                // }
                // // echo '<br>';
                // // echo $total_fn_fees;
                // // exit;
                // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                // $tr = Stripe\Charge::create ([
                //         "amount" => $total_fn_fees * 100,
                //         "currency" => "usd",
                //         "source" => $request->stripeToken,
                //         "description" => "Test payment from gst" 
                // ]);

                // // print_r($tr);
                // if($tr['status'] == 'succeeded'){
                //     $orderid = $tr['id'];
                //     $payment_status = 1;
                //     Session::flash('success', 'Payment successful!');   
                // $this->postAPIPayment();
            
                $payment_status = 1;

                $substype = Input::get('substype');
                $total_fn_fees = Input::get('fees');
                // $substype_name = Input::get('substype_name');
                $q_period = Input::get('q_period');
                $q_period_year = Input::get('q_period_year');
                $sel_incomes = Input::get('sel_incomes');
                $sel_expenses = Input::get('sel_expenses');

                $multiple_income_vals = Input::get('multiple_income_vals');
                $multiple_income_alter_vals = Input::get('multiple_income_alter_vals');
                $multiple_income_percent = Input::get('multiple_income_percent');

                $single_income_vals = Input::get('single_income_vals');
                $single_income_alter_vals = Input::get('single_income_alter_vals');
                $single_income_percent = Input::get('single_income_percent');

                $single_expense_date_vals = Input::get('single_expense_date_vals');
                $single_expense_makemodel_vals = Input::get('single_expense_makemodel_vals');
                $single_expense_business_percent_vals = Input::get('single_expense_business_percent_vals');

                $multiple_expense_date_vals = Input::get('multiple_expense_date_vals');
                $multiple_expense_makemodel_vals = Input::get('multiple_expense_makemodel_vals');
                $multiple_expense_business_percent_vals = Input::get('multiple_expense_business_percent_vals');

                $multiple_income_total = number_format((float)Input::get('multiple_income_total'), 2, '.', '');
                $multiple_income_gst_collected = number_format((float)Input::get('multiple_income_gst_collected'), 2, '.', '');
                $single_income_total = number_format((float)Input::get('single_income_total'), 2, '.', '');
                $single_income_gst_collected = number_format((float)Input::get('single_income_gst_collected'), 2, '.', '');

                $multiple_expense_vals = Input::get('multiple_expense_vals');
                $multiple_expense_percent = Input::get('multiple_expense_percent');

                $single_expense_vals = Input::get('single_expense_vals');
                $single_expense_percent = Input::get('single_expense_percent');

                $multiple_expense_total = number_format((float)Input::get('multiple_expense_total'), 2, '.', '');
                $multiple_expense_gst_paid = number_format((float)Input::get('multiple_expense_gst_paid'), 2, '.', '');
                $single_expense_gst_paid = number_format((float)Input::get('single_expense_gst_paid'), 2, '.', '');
                $single_expense_total = number_format((float)Input::get('single_expense_total'), 2, '.', '');


                $tot_period = Input::get('tot_period');
                
                $tot_income = number_format((float)Input::get('tot_income'), 2, '.', '');
                
                $tot_expense = number_format((float)Input::get('tot_expense'), 2, '.', '');
                

                // $invoices = Input::get('invoices');
                // $invoices2 = Input::get('invoices2');
                // $invoices3 = Input::get('invoices3');

                $substype = Input::get('substype');
                // $substype_name = Input::get('substype_name');
                // $substype_fees = Input::get('substype_fees');
                $period_sel_income = Input::get('period_sel_income');
                $period_sel_expense = Input::get('period_sel_expense');
                // echo '<pre>';
                // print_r(Session::all());//exit;

                // here save all client data into db at once

                $user_id        = Input::get('u_id');
                $clientd     = new Client();
                $clientddata = new ClientData();
                $clientdinvo = new ClientInvoices();

                // subscription type
                // $rem = array(
                //     'u_id'                              =>   $user->id,
                //     'substype'                          =>   $substype,
                // );
                // $clientd     = new Client($rem);
                // $clientd->save();
                // save/update subscription type 1/2/3
                $clientd::where('u_id', $user_id)->update([
                    'substype'                          =>   $substype,
                ]);

                // wizard data
                $rem = array(
                    'u_id'                              =>   $user_id,
                    'subscription_package'              =>   $substype,
                    'sel_incomes'                       =>   json_encode($sel_incomes),
                    'sel_expenses'                      =>   json_encode($sel_expenses),
                    'q_period'                          =>   $q_period,
                    'period_sel_income'                 =>   $period_sel_income,
                    'period_sel_expense'                =>   $period_sel_expense,
                    'multiple_income_vals'              =>   json_encode($multiple_income_vals),

                    'multiple_income_alter_vals'        =>   json_encode($multiple_income_alter_vals),
                    'multiple_income_percent'           =>   json_encode($multiple_income_percent),

                    'multiple_income_total'             =>   $multiple_income_total,
                    'multiple_income_gst_collected'     =>   $multiple_income_gst_collected,
                    'single_income_vals'                =>   json_encode($single_income_vals),

                    'single_income_alter_vals'          =>   json_encode($single_income_alter_vals),  
                    'single_income_percent'             =>   json_encode($single_income_percent),

                    'single_income_total'               =>   $single_income_total,
                    'single_income_gst_collected'       =>   $single_income_gst_collected,
                    'single_expense_vals'               =>   json_encode($single_expense_vals),

                    'single_expense_date_vals'                  => json_encode($single_expense_date_vals),
                    'single_expense_makemodel_vals'             => json_encode($single_expense_makemodel_vals),
                    'single_expense_business_percent_vals'      => json_encode($single_expense_business_percent_vals),
                    
                    'single_expense_percent'            =>   json_encode($single_expense_percent),
                    
                    'single_expense_total'              =>   $single_expense_total,
                    'single_expense_gst_paid'           =>   $single_expense_gst_paid,
                    'multiple_expense_vals'             =>   json_encode($multiple_expense_vals),

                    'multiple_expense_date_vals'                => json_encode($multiple_expense_date_vals),
                    'multiple_expense_makemodel_vals'           => json_encode($multiple_expense_makemodel_vals),
                    'multiple_expense_business_percent_vals'    => json_encode($multiple_expense_business_percent_vals),

                    
                    'multiple_expense_percent'          =>   json_encode($multiple_expense_percent),
                    
                    'multiple_expense_total'            =>   $multiple_expense_total,
                    'multiple_expense_gst_paid'         =>   $multiple_expense_gst_paid,
                    'tot_period'                        =>   $tot_period,
                    'tot_income'                        =>   $tot_income,
                    'tot_expense'                       =>   $tot_expense,
                    'quarter'                           =>   $q_period,
                    'year'                              =>   $q_period_year,
                    // 'created_at'                        =>   date(),
                );
                $clientddata = new ClientData($rem);
                $clientddata->save();
                $lastid = $clientddata->cd_id;

                // exit;
                $transaction_id = Input::get('transaction_id');
                $transaction_status = Input::get('transaction_status');
                $transaction_full_response = Input::get('full_response');



                $rem = array(
                    'u_id'                      => $user_id,
                    'cd_id'                     => $lastid, // attach record with transaction
                    'transaction_id'            => $transaction_id,
                    'subscription_id'           => $substype,
                    'transaction_status'        => $transaction_status,
                    'full_response'             => json_encode($transaction_full_response),
                    'payment_status'            => $payment_status,
                    'transaction_amount'        => $total_fn_fees,
                    // 'created_at'                => $created_at,
                );
                $ClientTransactions = new ClientTransactions($rem);
                $ClientTransactions->save();
            } catch(\Illuminate\Database\QueryException $ex){ 
                  // dd($ex->getMessage()); 
                return response()->json(['error'=> $ex->getMessage()]);
                  // Note any method of class PDOException can be called on $ex.
            }
            // echo '<pre>';
            // print_r($clientddata);

            // invoices 
            // if(!empty($all_invoices)){
            //     foreach($all_invoices as $inv){
            //         // echo $inv;echo '<br>';
            //         $rem = array(
            //             'u_id'           => $user->id,
            //             'invoice_name'   => $inv,
            //             'quarter'        => $q_period,
            //             'year'           => $q_period_year,
            //         );
            //         $clientdinvo = new ClientInvoices($rem);
            //         $clientdinvo->save();
            //     }
            // }
            // /exit;

            // echo 'all user data saved here';
            // exit;

            return response()->json(['success'=> 'successfully stored data']);

            // return View('site/client/client-step5', compact( 'success', 'substype_name', 'q_period', 'q_period_year', 'sel_incomes', 'sel_expenses', 'all_incomes', 'all_expenses'));
            // echo env('STRIPE_SECRET');
    }
    public function getAPIRecordByIDAndUID($nid, $uid){

        $ClientData = new ClientData();
        
        $allsubscriptions = $ClientData->where('u_id', $uid)->where('cd_id', $nid)->get();
        
        return response()->json([$allsubscriptions]);
    }
    public function getAPIAllRecordsByUID($uid){

        $ClientData = new ClientData();
        
        $allsubscriptionorders = $ClientData->where('u_id', $uid)->orderBy('cd_id', 'DESC')->get();

        return response()->json([$allsubscriptionorders]);
    }
    public function getAPIAllTransactionsByUID($uid){

        $alltransactions = new \App\ClientTransactions();
        $alltransactions = $alltransactions->select('ct_id', 'cd_id', 'u_id', 'transaction_id', 'transaction_status', 'transaction_amount',
         'subscription_id', 'created_at')->where('u_id', $uid)->orderBy('created_at','desc')->get();
        $r=0;
        foreach ($alltransactions as $key => $value) {
            $value['u_id'];
            $user             = Sentinel::findUserById($value['u_id']);

            $alltransactions[$r]->user_fname = $user->first_name;
            $alltransactions[$r]->user_lname = $user->last_name;
            $alltransactions[$r]->user_email = $user->email;
            $r++;
            # code...
        }

        return response()->json([$alltransactions]);
    }
    public function clientLogin() {
        if(Sentinel::check()){
            if(Sentinel::getUser()->roles[0]->slug == 'admin'){
                return Redirect::route('dashboard');
            }elseif (Sentinel::getUser()->roles[0]->slug == 'homeowner') {
                return Redirect::route('client-dashboard');
            } elseif(Sentinel::getUser()->roles[0]->slug == 'tradeperson') {
                return Redirect::route('client-dashboard');
            }
        }
        return View('site.login');
    }
    public function postclientLogin(Request $request) {

        // Declare the rules for the form validation
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|between:3,32',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {

            // Ooops.. something went wrong
            return back()->withInput()->withErrors($validator);
        }

        try {
            // Try to log the user in
            if(Sentinel::authenticate(Input::only('email', 'password'), Input::get('remember-me', false))) {
                if (Sentinel::check() && Sentinel::getUser()->roles[0]->slug == 'homeowner') {
                    if($request->session()->has('jobPost')) return Redirect::route('beforePostJob');
                } 
                if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug == 'tradeperson') {
                    if(Sentinel::getUser()->user_experience == null) return Redirect::route('update-profile', ['id' => Sentinel::getUser()->id, 'log' => 'true', 'active' => 'modal']);
                }
                return Redirect::route('client-dashboard');
            }

            $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));

        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended', compact('delay' )));
        }

        // Ooops.. something went wrong
        return Redirect::route("client-login")->withInput()->withErrors($this->messageBag);
    }
    public function userExperience() {
        $user = User::where('id', Sentinel::getUser()->id)->update([
          'user_experience' => \Carbon\Carbon::now()
        ]);
        
        if($user) return response()->json([
            'success'   => true,
            'id'        => Sentinel::getUser()->id
        ], 202);
    }
    public function clientLogout() {
        // Log the user out
        Sentinel::logout();
        return Redirect::to('login')->with('success', 'You have successfully logged out!');
    }

    public function clientRegister(Request $request) {
        
        if($request->is('client-login')){
            return view('site.registration', compact('roles'));
        } else {
            if(Sentinel::check()) {
                if (Sentinel::getUser()->roles[0]->slug == 'admin'){
                    return redirect()->route('dashboard');  // for administrative side
                } else {
                    return redirect()->route('client-dashboard'); // for customer side
                }            
            } else {
                $roles = Role::where('slug', '!=', 'admin')->get();
                return view('site.registration', compact('roles'));
            }
        }
    }
    public function postclientRegister(Request $request) {

        if(session()->has('jobPost')){
            $rules = array(
                'first_name'            => 'required|min:1',
                'last_name'             => 'required|min:1',
                'email'                 => 'required|email|unique:users',
                'password'              => 'required|min:8|between:8,32',
                // |regex:/^(?=.*[A-Z]).+$/'
                'confirm_password'      => 'required|min:8|same:password'
            );
            $messages = array(
                'required'              => 'The :attribute field is required.',
                'password.min'          => 'Minimum 8 characters password required.',
                'password.max'          => 'Maximum 32 characters password required.',
                // 'password.regex'        => 'Password should have one uppercase, one lowercase and digts in it.',
                'password.same'         => 'Password not matched.'
            );
    
            // Create a new validator instance from our validation rules
            $validator = Validator::make(Input::all(), $rules, $messages);
    
            // If validation fails, we'll exit the operation now.
            if ($validator->fails()) {
                // Ooops.. something went wrong
                // return Redirect::back()->withInput()->withErrors($validator);
                return redirect()->back()->withErrors($validator, 'registration');
            }
            $activate = true;
        } else {
            $rules = array(
                'first_name'            => 'required|min:1',
                'last_name'             => 'required|min:1',
                'email'                 => 'required|email|unique:users',
                'password'              => 'required|min:8|between:8,32',
                // |regex:/^(?=.*[A-Z]).+$/
                'confirm_password'      => 'required|min:8|same:password', 
                'role'                  => 'required',
            );
            $messages = array(
                'required'              => 'The :attribute field is required.',
                'password.min'          => 'Minimum 8 characters password required.',
                'password.max'          => 'Maximum 32 characters password required.',
                // 'password.regex'        => 'Password should have one Uppercase, one lowercase and digts in it.',
                'password.same'         => 'Password not matched.',
                'role.required'         => 'Plesae select, what you want be to?',
            );
    
            // Create a new validator instance from our validation rules
            $validator = Validator::make(Input::all(), $rules, $messages);
    
            // If validation fails, we'll exit the operation now.
            if ($validator->fails()) {
                // Ooops.. something went wrong
                // return Redirect::back()->withInput()->withErrors($validator);
                return redirect()->back()->withErrors($validator, 'registration');
            }
            $activate = true;
        }
       
        try {
            
            // Register the user.
            $user = Sentinel::register(array(
                'first_name'    => Input::get('first_name'),
                'last_name'     => Input::get('last_name'),
                'email'         => Input::get('email'),
                'password'      => Input::get('password'),
                'verify_token'  => str_random(32)
            ), $activate);

            $userData = ['u_id' => $user->id];
            $userDetails = new UserDetails($userData);
            $userDetails->save();
            if(session()->has('jobPost')){
                // attach Homeonwer with user.
                $user = User::find($user->id);
                $roleId = Role::where('slug', 'homeowner')->first();
                $user->roles()->attach($roleId);
            } else {
                // attach role with user.
                $user = User::find($user->id);
                $roleId = Role::where('slug', Input::get('role'))->first();
                $user->roles()->attach($roleId);
            }

            $user = array(
                'first_name'    => $user->first_name,
                'last_name'     => $user->last_name,
                'full_name'      => $user->first_name.' '.$user->last_name,
                'email'         => $user->email,
                'token'         => $user->verify_token
            );

            Mail::send('emails.register', compact('user'), function ($m) use ($user){
                $m->to($user['email'], $user['full_name'])->subject('Email Verification');
            });
            $request->session()->flash('info', 'Thanks for signing up! Please check your email.');
            return Redirect::route('client-login', compact('user'));
            
        } catch (LoginRequiredException $e) {
            $error = Lang::get('admin/members/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('admin/members/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = Lang::get('admin/members/message.user_exists');
        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            $error = Lang::get('auth/message.account_not_activated');
        } 

        // Redirect to the user creation page
        return Redirect::back()->withInput()->with('error', $error);
    }
    public function clientDashboard(){

        $user = Sentinel::getUser();
        if (Sentinel::check()) {
            if($user->roles[0]->slug == 'admin'){
                return Redirect::route('dashboard');
            } elseif($user->roles[0]->slug == 'tradeperson') {
                if($user->userDetails->twilio_status == 'approved') {
                    return view('site.tradepeople.index', compact('user'));
                }else {
                    return redirect()->route('update/profile', $user->id)->with(['message' => 'Complete your profile to get full access.']);
                }
            } elseif($user->roles[0]->slug == 'homeowner') {
                if(Sentinel::getUser()->userDetails->twilio_status == 'approved' && Sentinel::getUser()->email_verified_at != null) {
                    $jobs = Sentinel::getUser()->jobs;
                    $empty = [];
                    foreach($jobs as $job) {
                        if(!in_array(SubCategory::where('id', $jobs[0]->sub_category_id)->first()->id, $empty)){
                            $sub_categories[] = SubCategory::where('id', $job->sub_category_id)->first();
                        }
                        $empty[] = SubCategory::where('id', $job->sub_category_id)->first()->id;
                    }
                    $sub_categories = collect();
                    return view('site.homeowner.index', compact('user', 'sub_categories'));
                } else {
                    return redirect()->route('update/profile', Sentinel::getUser()->id)->with(['message' => 'Complete your profile to get full access.']);
                }
            }
        }
        abort(404);
    }
    public function homeownerJsonData() {

        if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug == 'homeowner'){            
            $user = Sentinel::getUser();
            $jobs = $user->jobs;
            foreach($jobs as $job) {
                $sub_category_name = SubCategory::where('id', $job->sub_category_id)->first();
                $job->sub_category_id = $sub_category_name->name;
                
                for($i=0; $i < count($job->leadPurchaseBy); $i++){
                    $job->leadPurchaseBy[$i]->userdetails = UserDetails::where('u_id', $job->leadPurchaseBy[$i]->id)->first();
                }
                $res[] = $job;
            }
        }
        $response = view('site.homeowner.post', compact('res', 'user'))->render();
        return $response;
    }
    public function tradespeopleJsonData(Request $request) {

        if($request->ajax()){
            if(Sentinel::check()){
                $totalLeads = Sentinel::getUser()->leads;
                if(count($totalLeads) > 0){
                    foreach($totalLeads as $key => $lead){
                        $owner_id  = User::where('id', $lead->owner_id)
                            ->leftJoin('user_details', 'users.id', '=', 'user_details.u_id')
                            ->select('users.*', 'user_details.country_code', 'user_details.phone')
                            ->first();
                        $sub_category_name = SubCategory::where('id', $lead->sub_category_id)->first();
                        $lead->sub_category_id = $sub_category_name->name;
                        $lead->owner_id = $owner_id;
                        
                        $job[$lead->pivot->status][] = $lead;
                    }
                    if(array_key_exists($request->page, $job)){
                        // sizeof($job[$request->page]); // Total number leads
                        $jobs = $job[$request->page];
                        return $response = view('site.tradepeople.post', compact('jobs'))->render();
                    }
                }
                return $response = $job[$request->page] = '<div class="alert alert-warning" role="alert"> <strong>'.ucfirst($request->page).'</strong> — No Leads Found.';
            }
        }
    }
    public function moveTo(Request $request) {
        if($request->ajax()){
            try {
                $response = DB::table('user_leads')
                    ->where('user_id', $request->user_id)
                    ->where('job_id', $request->job_id)
                    ->update(['status' => $request->page ]);

                return $response;
            } catch(Execption $execption) {
                return $execption;
            }
        }
    }
    public function clientEdit(){
        if (!Sentinel::check()) {
            return Redirect::route('client-login');
        }

        $user = Sentinel::getUser();
        
        $mainMenu = null;
        $menu = new MenuLink;
        $menuData = $menu->all();

        foreach ($menuData as $menuSingle) {
            $pageLink = $menu->getPageLink($menuSingle->page_id);
            $menuSingle->page_id = $pageLink['slug'];
            $mainMenu[] = $menuSingle;
        }
        $menuData = $mainMenu;
        // Show the page
        return View('site/client/client-profile-edit', compact( 'menuData', 'menu', 'user'));
    }
    public function postClientEdit(){
        if (!Sentinel::check()) {
            return Redirect::route('client-login');
        }

        $user = Sentinel::getUser();
        $clientd = new Client();
        //$ud = $ud->where('ud_id', $user->userDetails->ud_id)->first();
        $clientd = $clientd->find($user->client->client_id);

        //
        $this->validationRules['email'] = "required|email|unique:users,email,{$user->email},email";

        // Do we want to update the user password?
        if ( ! $password = Input::get('password')) {
            unset($this->validationRules['password']);
            unset($this->validationRules['password_confirm']);
        }

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $this->validationRules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }

        try {
            // Update the user
            $user->first_name  = Input::get('first_name');
            $user->last_name   = Input::get('last_name');
            $user->family_name = Input::get('family_name');
            //$user->email       = Input::get('email');
            
            $clientd->u_id          = $user->id;
            $clientd->dob           = Input::get('dob');            
            $clientd->gender        = Input::get('gender');
            // $clientd->state      = Input::get('state');
            // $clientd->city       = str_replace('"', "", Input::get('city'));
            $clientd->address       = Input::get('address');
            $clientd->abn_number    = Input::get('abn_number');
            $clientd->tfn_number    = Input::get('tfn_number');
            $clientd->phone         = Input::get('phone');
            $clientd->allow_admin   = Input::get('allow_admin');
            $clientd->documents     = Input::get('documents');
            
            // Do we want to update the user password?
            if ($password) {
                $user->password = Hash::make($password);
            }

            // Was the user updated?
            if ($user->save()) {
                //dd($ud);
                $clientd->save();
            
                // Prepare the success message
                $success = Lang::get('members/message.success.update');

                // Redirect to the user page
                return Redirect::route('client-profile-edit')->with('success', $success);
            }

            // Prepare the error message
            $error = Lang::get('members/message.error.update');
        } catch (LoginRequiredException $e) {
            $error = Lang::get('members/message.member_login_required');
        }

        // Redirect to the user page
        return Redirect::route('client-profile-edit')->withInput()->with('error', $error);
    }
    public function clientForgotPassword(){
        if (Sentinel::check()) {
            return Redirect::route('client-dashboard');
        }
        $roles = $roles = Role::where('slug', '!=', 'admin')->get();
        return View('site.forgot-password', compact('roles'));
    } 
    public function postClientForgotPassword(Request $request) {
        // Declare the rules for the validator
        $rules = array(
            'email' => 'required|email',
            'role'  => 'required|string',
        );

        // Create a new validator instance from our dynamic rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return back()->withInput()->withErrors($validator);
        }

        // Get the user password recovery code
        try {
            $user = User::where('email', '=', $request->email)->firstOrFail();
            $role = $user->roles;

            if($user && $role[0]->slug == $request->role) {
                //get reminder for user -- By Sentinel
                $reminder = Reminder::exists($user) ?: Reminder::create($user);

                // Data to be used on the email view
                $data = array(
                    'user'              => $user,
                    'forgotPasswordUrl' => URL::route('client-reset-password',[$user->id, $reminder->code]),
                );
                // Send the activation code through email
                $user['adminemail'] = SiteSetting::first()->contact_to_email;
                Mail::send('emails.member-forgot-password', $data, function ($m) use ($user) {
                    $m->to($user->email, ucfirst($user->first_name).' '.ucfirst($user->last_name));
                    $m->from($user['adminemail'], 'Admin');
                    $m->subject('Account Password Recovery');
                });

                return Redirect::route('client-login')->with('info', 'Check your mailbox.');
            }
        } catch(ModelNotFoundException $execption) {
            return Redirect::to(URL::previous())->with('error', 'Email does not exist.');
        }
    } 

    public function getForgotPasswordConfirm($userId, $passwordResetCode = null) {
        // Find the user using the password reset code
        if(!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('client-reset-password')->with('error', Lang::get('auth/message.account_not_found'));
        }
        // Show the page
        return View('site.reset-password', compact('userId', 'passwordResetCode'));
    }
    public function postForgotPasswordConfirm(Request $request, $userId, $passwordResetCode = null) {
        
        // dd($request->all(), $userId, $passwordResetCode);
        // Declare the rules for the form validation
        $rules = array(
            'password'         => 'required|min:8|between:3,32|regex:/^(?=.*[A-Z]).+$/',
            'password_confirm' => 'required|min:8|same:password',         
        );
        // Create a new validator instance from our dynamic rules
        $validator = Validator::make(Input::all(), $rules);
        // If validation fails, we'll exit the operation now.
        
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withErrors($validator, 'resetPassword');
            // return Redirect::to('reset-password',  array($userId, $passwordResetCode))->with($validator);
        }

        // dd($validator->messages());
        // Find the user using the password reset code
        $user = Sentinel::findById($userId);
        // print(Input::get('password'));

        $reminder = Reminder::complete($user, $passwordResetCode, $request->password);

        if(!$reminder) {
            // Ooops.. something went wrong
            return Redirect::route('client-login')->with('error', Lang::get('auth/message.forgot-password-confirm.error'));
        }
        // Password successfully reseted
        return Redirect::route('client-login')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
    }  
    public function clientSubscription() {
        // if(Sentinel::check())
        //     return View('admin/index');
        // else
        //     return Red1irect::to('admin/signin')->with('error', 'You must be logged in!');
        return View('site/client/client-subscription');
    }

    #24Seven -- functions
    public function homePage($name='null',$end=null) {
        
        $limitedCategories = Category::where('status', '=', 1)->limit(8)->get();
        $categories = Category::where('status', '=', 1)->get();
        $ramdomJob = Job::where('publish', 1)
            ->leftJoin('users', 'jobs.owner_id', '=', 'users.id')
            ->leftJoin('user_details', 'users.id', '=', 'user_details.u_id')
            ->select('jobs.*', 'users.*', 'user_details.picture')
            ->limit(6)
            ->get();
        $testimonials = Testimonial::where('is_home', 1)
            ->limit(5)
            ->get();
        
        return View('template/home', compact('limitedCategories', 'categories', 'ramdomJob', 'testimonials'));
    }
    public function Wizard(Request $request) {  

        $request->session()->has('jobPost') ? $request->session()->forget('jobPost') : '';
        if($request->ajax()){
            try{
                $id = SubCategory::find($request->sub_category_id);
                for ($i=0; $i < $id->questions->count() ; $i++) { 
                    $id->questions[$i]->answer = json_decode($id->questions[$i]->answer); 
                }
                $questions = $id->questions;
                $html = View('site.wizard.card', compact('questions'))->render();
                return response()->json($html);

            } catch(\Execption $execption) {
                return $execption;
            }
        }         
    }
    
    // liveLeads landing page
    public function liveleads(Request $request) {
        $categories = Category::where('status', 1)->get(); 
        if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug == 'tradeperson') {
            $services = $this->TP_services(Sentinel::getUser()->id);
            if($services) {
                return view('site.liveleads.index', compact('categories', 'services'));
            } else {
                return view('site.liveleads.index', compact('categories'))->with('info', 'please update your services to get a suitable jobs');
            }
        }
        return view('site.liveleads.index', compact('categories'));
    }
    // Aja call for liveLeads
    public function leadsData(Request $request) {
        $status_decode = json_decode($request->status);
        if($request->ajax()) {
            if($request->search && $request->category){
                $jobs = Job::where('publish', 1)
                    ->leftJoin('sub_categories', 'jobs.sub_category_id', '=', 'sub_categories.id')
                    ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
                    ->where('categories.id', '=', $request->category)
                    ->where('jobs.title', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('jobs.description', 'LIKE', '%'.$request->search.'%')
                    ->select('jobs.*', 'sub_categories.name')
                    ->orderBy('jobs.created_at', 'desc')
                    ->paginate(10);
            } elseif($request->search && !$request->category) {
                $jobs = Job::where('publish', 1)
                    ->leftJoin('sub_categories', 'jobs.sub_category_id', '=', 'sub_categories.id')
                    ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
                    ->where('jobs.title', 'LIKE', '%'.$request->search.'%')
                    ->orWhere('jobs.description', 'LIKE', '%'.$request->search.'%')
                    ->select('jobs.*', 'sub_categories.name')
                    ->orderBy('jobs.created_at', 'desc')
                    ->paginate(10);

            } elseif(!$request->search && $request->category) {
                $jobs = Job::where('publish', 1)
                    ->leftJoin('sub_categories', 'jobs.sub_category_id', '=', 'sub_categories.id')
                    ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
                    ->where('categories.id', '=',$request->category)
                    ->select('jobs.*', 'sub_categories.name')
                    ->orderBy('jobs.created_at', 'desc')
                    ->paginate(10);

            } else {
                if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug == 'tradeperson') {
                    $user = Sentinel::getUser();
                    $services = $user->account_setting->services = json_decode($user->account_setting->services);
                    if($services != null) {
                        if($services != null && $user->gdata != null) {
                            $job = Job::where('publish', 1)
                                ->leftJoin('sub_categories', 'jobs.sub_category_id', '=', 'sub_categories.id')
                                ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
                                ->whereNull('jobs.deleted_at')
                                ->where(function($q) use ($services) {
                                    foreach($services as $service) {
                                        $q->orWhere('categories.name', '=', $service);
                                    }
                                });
                            if($status_decode != null) {
                                $availableJobs = [];

                                // available jobs array.
                                for ($i=0; $i < count($status_decode); $i++) { 
                                    if($status_decode[$i]->status == true) {
                                        $availableJobs[] = $status_decode[$i]->jobs_id;
                                    }
                                }
                                if (!empty($availableJobs)) {
                                    $CollectJobs = [];
                                    
                                    for($i=0; $i < count($availableJobs); $i++) {
                                        $leadPurchased = Job::find($availableJobs[$i])->leadPurchaseBy;
                                                                         
                                        // if job has less then 3 leads and job lead is not purchase by tradesperson it will show to the person.
                                        if(count($leadPurchased) < 3) {                                        
                                            $CollectJobs[] = $availableJobs[$i];
                                        }
                                    }

                                    $jobs = $job
                                    ->where(function($q) use ($CollectJobs) {
                                        foreach($CollectJobs as $id) {
                                            $q->orWhere('jobs.id', '=', $id);
                                        }
                                    })
                                    ->select('jobs.*', 'sub_categories.name')
                                    ->orderBy('jobs.created_at', 'desc')
                                    ->paginate(10);

                                } else {
                                    $jobs = 'Currently there is no job results found in your specific area.';
                                }
                            } else {
                                $jobs = $job->select('jobs.*', 'sub_categories.name')
                                    ->orderBy('jobs.created_at', 'desc')
                                    ->paginate(10);
                            }
                        } else {
                            $jobs = 'Please select your location or set your work area to get perfect job results near to you.';
                        }
                    } else {
                        $jobs = 'First select your services, to get suitable job results.';
                    }
                } else {
                    $jobs = Job::where('publish', 1)
                        ->leftJoin('sub_categories', 'jobs.sub_category_id', '=', 'sub_categories.id')
                        ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')
                        ->select('jobs.*', 'sub_categories.name')
                        ->orderBy('jobs.created_at', 'desc')
                        ->paginate(10);
                }
            }
            $html = view('site.liveleads.post', compact('jobs'))->render();
            return $html;
        }
    }
    public function removeLead(Request $request) {
        if($request->ajax() && $request->isMethod('post')) {
            UserReaction::create([
                'user_id'       => Sentinel::getUser()->id,
                'job_id'        => $request->job_id
            ]);
            
            return response()->json([
                success => true,
                path    => '/live-leads'
            ], 200);
        }
    }
    public function TP_services($id) {
        if(Sentinel::getUser()->id == $id && Sentinel::getUser()->roles[0]->slug == 'tradeperson'){
            $services = AccountSetting::where('user_id', $id)->first();
            if($services) {
                $services->services = json_decode($services->services);
                return $services;
            } else {
                return 0;
            }
        } else {
            abort(404, 'Not Found.');
        }
    }
    public function showFrontEndView($name=null,$end=null) {
        $page = new Page;
        $pageData = $page->getTemplate($name);
        
        $preview = \Request::query('preview');
        if($preview=="true"){
            $pageContent = $page->where('slug', $name)->where('status',3)->first();
        }else{
            $pageContent = $page->where('slug', $name)->first();
        }
        $slider = new Slider;
        $testimonials = new Testimonial;
        $slides = $slider->orderBy('slider_order', 'asc')->get()->toArray();

        $site_setting = new SiteSetting;
        $site_setting = $site_setting->first();

        $name = isset($pageData->template) && !empty($pageData->template) ? $pageData->template : 'default';
        if (View::exists('template/'.$name)) {
            
            if ($name == 'contact') {
                return View('template/'.$name);
            }

            if ($name == 'testimonial') {
                $testimonial = new Testimonial;
                $testimonials = $testimonial->get()->toArray();
                return View('template/'.$name, compact('testimonials'));
            }

            if ($name == 'faq') {
                $faqs = Faq::all();
                return View('template/'.$name, compact('faqs'));
            }
            
            if ($name == 'news') {
                $news = new News;
                $newsData = $news->orderBy('created_at', 'desc')->where('status', '<>', 3)->paginate(10);
                
                $sidebar = NewsCategory::where('status', '=', 1)->get();
               
                foreach($sidebar as $sd){
                    $count = News::where('news_category_id', '=', $sd->id)->where('status', '<>', 3)->count();
                    $sdbar[] = array(
                        'catname'   =>  $sd->title,  
                        'catslug'   =>  $sd->slug,  
                                'catcount'  =>  $count
                            );
                        }
                        $latnews = News::where('status', '=', 1)->where('type', '=', 'news')->orderBy('published_date','DESC')->take(5)->get();
                        $latnevents = News::where('status', '=', 1)->where('type', '=', 'events')->orderBy('published_date','DESC')->take(5)->get();
                        $sdbarData = $sdbar;
                
                return View('template/'.$name, compact('newsData', 'sdbarData', 'latnews', 'latnevents', 'pageContent', 'menuData', 'editUrl', 'preview','menu', 'totcounts'));
            }

            if($name == 'offer') {
                return View('template/'.$name);
            }

            if($name == 'cookies') {
                return View('template/'.$name, compact('pageContent'));
            }
            
            if ($name == 'homeowner_faq') {
                return View('template/'.$name, compact('pageContent')); 
            }
        
            if ($name == 'tradespeople_faqs') {
                return View('template/'.$name, compact('pageContent'));
            }

            if($name == 'terms_of_use') {
                return View('template/'.$name, compact('pageContent'));
            }

            if($name == 'Privacy_Policy') {
                return View('template/'.$name, compact('pageContent'));
            }

            if($pageContent == null){
                return View('admin/404');
            }
            
            return View('template/'.$name, compact('pageContent'));
        }
        else
        {
            return View('admin/404');
        }
    }
    
    // API Functionality
    public function API_login(Request $request){
                $email =  trim($request->email);

        $rules = array(
            // 'email'    => 'required|email',
            'password' => 'required|between:3,32',
        );
           
        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);
        try{
            // If validation fails, we'll exit the operation now.
            if ($validator->fails()) {

                // Ooops.. something went wrong
                return back()->withInput()->withErrors($validator);
                
            }else{


                   if(Sentinel::authenticate(Input::only('email', 'password'))){
               
                    $user = User::where('email',$email)->with('userDetails','account_setting','roles')->first();
                     

                    if($request->notificationToken){
                        User::where('email',$email)
                            ->update([
                            'notificationToken' => $request->notificationToken
                        ]);
                    }
                
                return response()->json([
                        'error' => false,
                        'data' => $user,
                        'message' => "Thanks for signing in!",
                        'success'=> true
                    ]);
                }else{
                    return response()->json([
                        'error' => true,
                        'message' => "Kindly check your credentials",
                        'success'=> false
                    ]);
                }
            }
        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            $error = Lang::get('auth/message.account_not_activated');
            return response()->json([
                    'error' => true,
                    'message' => $error,
                    'success'=> false
                ]);
        } catch (LoginRequiredException $e) {
            $error = Lang::get('admin/members/message.user_login_required');
            return response()->json([
                'error' => true,
                'message' => $error,
                'success'=> false
            ]);
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('admin/members/message.user_password_required');
            return response()->json([
                'error' => true,
                'message' => $error,
                'success'=> false
            ]);
        } catch (UserExistsException $e) {
            $error = Lang::get('admin/members/message.user_exists');
            return response()->json([
                'error' => true,
                'message' => $error,
                'success'=> false
            ]);
        }
    }
    public function decativeAccount(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->de_activate =  $request->de_activate;
        $user->save();
        if($user->de_activate == 1 || $user->de_activate == '1'){
            return response()->json([
                    'error' => false,
                    'message' => "Your account de-activated",
                    'success'=> true
            ]);
        }else{
             return response()->json([
                    'error' => false,
                    'message' => "Your account activated",
                    'success'=> true
            ]);
        }
    }
    public function deleteAccount(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->delete();
        $user->userDetails->delete();
            return response()->json([
                    'error' => false,
                    'message' => "Your account deleted",
                    'success'=> true
            ]);
      
    }
    public function resetPassword(Request $request){
        $user = User::where('id',$request->id)->first();
         $data = [
                'email'=>$user->email,
                'password'=>$request->oldPassword
                ];
        if(Sentinel::authenticate($data)){
            
            $user->password = Hash::make($request->newPassword);


            $user->save();
            return response()->json([
                    'error' => false,
                    'message' => "your password successfully reset",
                    'success'=> true
            ]);
        }else{
            return response()->json([
                    'error' => true,
                    'message' => "incorrect old password",
                    'success'=> false
            ]);
        }
    }
    public function getUserProfile(Request $request){
        $user = User::where('id',$request->id)->with('userDetails','account_setting','roles')->first();
        if($user){
            return response()->json([
                'error' => false,
                'message' => "Your profile.",
                'data' => $user,
                'success'=> true
            ]);
        }
    }
    public function postAJob(Request $request){
       
        $user = User::where('id',$request->id)->first(); 
        if($user){
            $response = $this->cURL($request->postcode);
            $response = json_decode($response);
            if($response->status == 200) {
                $job = Job::create([
                    'owner_id'          => $user->id,
                    'sub_category_id'   => $request->subcategory,
                    'title'             => $request->title,
                    'term_condition'    => 1,
                    'description'       => $request->description,
                    'reference_number'  => str_random(10),
                    'publish'           => 1,
                    'postcode'          => $request->postcode,
                    'location'          => $response->result->admin_district,
                    'lat'               => $response->result->latitude,
                    'lng'               => $response->result->longitude
                ]);
                if($job == null) return response()->json([
                    'error' => true,
                    'message' => "Couldn't create a job post.",
                    'success'=> false
                ]);
                    
                $users = User::whereNotNull('email_verified_at')
                    ->whereHas('roles', function ($q) {
                        $q->where('role_id', 3);
                    })->whereHas('gdata', function ($q) {
                        $q->whereNotNull('coordinates');
                    })->whereHas('account_setting', function ($q) {
                        $q->whereNotNull('services');
                    })->get();
                
                $job_coords = [$response->result->latitude, $response->result->longitude];
                $category = SubCategory::where('id', $request->subcategory)->with('Associated_Category')->first();
                
                foreach($users as $user) {
                    $user_services = json_decode($user->account_setting->services);
                    if(array_search($category->Associated_Category->name, $user_services, true) !== false) {
                        if($this->sentNotificationToTradeperson($job_coords, json_decode($user->gdata->coordinates))) {
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
                                
                                curl_close($curl);
                            }
                            // Send Message Notification
                            // String User full number
                            if($user->sms_allowed && $user->sms_allowed == 1) {
                                try {
                                    $this->sendMsgThroughTwilio($user->userDetails->country_code.$user->userDetails->phone);
                                } catch (\Exception $e) {
                                    // return $e->getMessage();
                                }
                            }
                            //end Notify user
                            // Send Email Notification
                            if($user->email_allowed && $user->email_allowed == 1) {
                                Mail::send('emails.notifications.new_job', compact('user'), function ($m) use ($user){
                                    $m->to($user->email, $user->first_name)->subject('New Job Notification');
                                });
                            }
                        }
                    }
                }
                return response()->json([
                    'error' => false,
                    'message' => "Job created Successfully",
                    'success'=> true
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => "incorrect post code",
                    'success'=> false
                ]);
            }
        }
    }
    
    // only for testing
    // public function sendNotificationExpo(Request $request) {
    //     $payload = array(
    //         'to' => 'ExponentPushToken[HKfz15F4nP_ulataAO_NhZ]',
    //         'sound' => 'default',
    //         'body' => 'Hello Ismail',
    //         'channelId' => 'default'
    //     );
    //     $curl = curl_init();
        
    //     curl_setopt_array($curl, array(
    //       CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
    //       CURLOPT_RETURNTRANSFER => true,
    //       CURLOPT_ENCODING => "",
    //       CURLOPT_MAXREDIRS => 10,
    //       CURLOPT_TIMEOUT => 30,
    //       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //       CURLOPT_SSL_VERIFYHOST =>  0,
    //       CURLOPT_SSL_VERIFYHOST =>  0,
    //       CURLOPT_CUSTOMREQUEST => "POST",
    //       CURLOPT_POSTFIELDS => json_encode($payload),
    //       CURLOPT_HTTPHEADER => array(
    //         "Accept: application/json",
    //         "Accept-Encoding: gzip, deflate",
    //         "Content-Type: application/json",
    //         "cache-control: no-cache",
    //         "host: exp.host"
    //       ),
    //     ));
    
    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
        
    //     curl_close($curl);
        
    //     if ($err) {
    //       echo "cURL Error #:" . $err;
    //     } else {
    //       echo $response;
    //     }
    // }
    
    public function cURL($postcode) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'api.postcodes.io/postcodes/'.$postcode);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        return $response;
    }
    public function editProfile(Request $request) {
        
        $postal = $this->cURL($request->postal);
        $postal = json_decode($postal);
        if($postal->status != 200) {
            return response()->json([
                    'error' => true,
                    'message' => "Kindly provide correct Post Code",
                    'success'=> false
            ]);
        }
        $postal = $postal->result;
        $user = User::where('id',$request->id)->with('userDetails','account_setting','roles')->first();
        if ($user) {
            try {
                if ($request->fname || $request->lname) {
                    User::where('id', $request->id)->update([
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
                    'postal'        => $postal->postcode,
                    'lat'           => $postal->latitude && $postal->latitude != 0.00000  ? $postal->latitude : null,
                    'lng'           => $postal->longitude && $postal->longitude != 0.00000 ? $postal->longitude : null
                ]);
             
                GoogleData::where('user_id', $user->id)->update([
                    'coordinates'   => null
                ]);
                $updateUser = User::where('id',$user->id)->with('userDetails','account_setting','roles')->first();
                return response()->json([
                    'error' => false,
                    'message' => "Your profile has been updated successfully.",
                    'data' => $updateUser,
                    'success'=> true
                ]);
            } catch (ModelNotFoundException $exception) {
                return $exception;
            }
        }
    }
    public function deleteJob(Request $request){
        $user = User::where('id',$request->id)->first();

        if($user && $user->roles[0]->slug == 'homeowner') {
            $jobId = collect()->toArray();
                    
            foreach($user->jobs as $jobs) {
                $jobId[] = $jobs->id;
            }

            if(in_array((int)$request->job_id, $jobId)) {
                try{
                    $job = Job::findOrFail($request->job_id);
                    $job->delete();
                    return response()->json([
                        'error' => false,
                        'data' => [],
                        'message' => 'Post delete successfully.',
                        'success'=> true
                    ]);
                    // return Redirect::back()->with('success', 'Post delete successfully.');
                } catch(\Execption $execption) {
                    // throw new Execption('Job not found.');
                    return response()->json([
                        'error' => true,
                        'data' => [],
                        'message' => 'job not found',
                        'success'=> false
                    ]);
                }
            }

            return response()->json([
                        'error' => true,
                        'data' => [],
                        'message' => 'Resources not found.',
                        'success'=> false
                    ]);
        }
    }
    public function API_removeLead(Request $request) {
            UserReaction::create([
                'user_id'       => $request->id,
                'job_id'        => $request->job_id
            ]);
            return response()->json([
                'error' => false,
                'data' => [],
                'success'=> true
            ]);
    }
    public function getRoles(){
        $roles = Role::where('slug','!=','admin')->get()->toArray();
        return response()->json([
            'error' => false,
            'data' => $roles,
            'success'=> true
        ]);
        
    }
    public function myNotificationStatus(Request $request){
        $user = User::where('id',$request->id)->first();
        if($user){
            return response()->json([
               'error' => false,
               'message' => "",
               'data' => [
                   'notification_allowed'  => $user->notification_allowed,
                   'sms_allowed'           => $user->sms_allowed,
                   'email_allowed'         => $user->email_allowed
               ],
               'success'=> true
           ]);
        }
    }
    public function notifyMe(Request $request){
        $user = User::where('id',$request->id)->first();
        if($user){
            $updateArray = [
                'notification_allowed' => $request->notification_allowed,
                'sms_allowed' => $request->sms_allowed,
                'email_allowed'=>$request->email_allowed
            ];
            $user = User::where('id',$request->id)
                ->update($updateArray);
                return response()->json([
                   'error' => false,
                   'message' => "Notification status changed!",
                    'data' => $updateArray,
                   'success'=> true
                ]);
        }
        return response()->json([
           'error' => true,
           'message' => "Kindly Login First.",
           'success'=> false
        ]);
    }
    public function verifyAccountFromTwilio(Request $request) {
        
        $data = [
            'full_number'    => $request->number,
            'code'      => $request->code
        ];
        $twilioResponse = $this->verifyToken($data);
        
        if ($twilioResponse->status == "pending" && $twilioResponse->valid == false) {
            return response()->json([
                'error' => true,
                'data' => [],
                'message' => "Please enter valid verification code.",
                'success'=> false
            ]);
        }
        elseif ($twilioResponse->status == "approved" && $twilioResponse->valid == true) {
            $user = User::where('id', $request->user_id)->first();
            $full_number = $user->userDetails->country_code . $user->userDetails->phone;

            if ($twilioResponse->to == $full_number) {
                UserDetails::where('u_id', $request->user_id)->update([
                    'service_sid' => $twilioResponse->serviceSid,
                    'twilio_status' => $twilioResponse->status,
                    'via' => $twilioResponse->channel,
                ]);

                User::where('id', $user->id)->update([
                    'verify_token'          => null,
                    'email_verified_at'     => date('Y-m-d H:i:s'),
                ]);
                
                return response()->json([
                    'error' => false,
                    'data' => [],
                    'message' => 'You number is successfully verified.',
                    'success'=> true
                ]);
            } 
        } else {
            return response()->json([
                'error' => true,
                'data' => [],
                'message' => 'Iusse occured.',
                'success'=> false
            ]);
        }
    }
    public function sendNewCodeFromTwilio(Request $request) {
        
        $data = [
            'phone_number'      => $request->number,
            'via'               => 'sms',
        ];
        $twilioResponse = $this->startVerification($data);
        if($twilioResponse->status == 'pending') {
            return response()->json([
                'error' => false,
                'data' => $twilioResponse,
                'message' => "New Code has send to your number.",
                'success'=> true
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => $twilioResponse,
                'message' => "Error while sending code to this number.",
                'success'=> false
            ]);
        }
    }
    public function API_register(Request $request) {
        
        $rules = array(
            'first_name'            => 'required|min:1',
            'last_name'             => 'required|min:1',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8|between:8,32',
            'confirm_password'      => 'required|min:8|same:password', 
            'country_code'          => 'required|min:1',
            'phone'                 => 'required|unique:user_details|min:7',
            'role'                  => 'required',
        );
        $messages = array(
            'required'              => 'The :attribute field is required.',
            'password.min'          => 'Minimum 8 characters password required.',
            'password.max'          => 'Maximum 32 characters password required.',
            'password.same'         => 'Password not matched.',
            'role.required'         => 'Plesae select, what you want be to?',
            'phone.unique'          => 'The number has already been taken.',
        );
    
        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules, $messages);
            
        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            // return Redirect::back()->withInput()->withErrors($validator);
            if($request->is('api/register')) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors()->first(),
                    'success'=> false
                ]);
            }
            return redirect()->back()->withErrors($validator, 'registration');
        }
        $activate = true;
        
        try {
            $data = [
                'phone_number'      => $request->country_code.$request->phone,
                'via'               => 'sms',
            ];
            $twilioResponse = $this->startVerification($data);
            if ($twilioResponse->status == 'pending') {
                // 
            } else {
                return response()->json([
                    'error' => true,
                    'data' => [],
                    'message' => "Wrong Number",
                    'success'=> false
                ]);
            }
            
            // Register the user.
            $user = Sentinel::register(array(
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'password'      => $request->password,
                'verify_token'  => str_random(32)
            ), $activate);

            $userData = [
                'u_id'              => $user->id,
                'country_code'      => $request->country_code,
                'phone'             => $request->phone,
                'twilio_status'     => 'pending'
            ];
            $userDetails = new UserDetails($userData);
            $userDetails->save();
            
            // attach role with user.
            $user = User::find($user->id);
            $roleId = Role::where('id', $request->role)->first();
            $user->roles()->attach($roleId);

            $userDetails = User::where('id',$user->id)->with('userDetails','account_setting','roles')->first();

            $role = $user->roles;
            $user = array(
                'id'            =>$user->id,
                'first_name'    => $user->first_name,
                'last_name'     => $user->last_name,
                'full_name'      => $user->first_name.' '.$user->last_name,
                'email'         => $user->email,
                'token'         => $user->verify_token,
                'role'          => $role[0]
            );           
            
            if($request->is('api/register') && $request->isMethod('post')) {                
                return response()->json([
                    'error' => false,
                    'data' => $userDetails,
                    'message' => "Thanks for signing up! Code has been send to your number.",
                    'success'=> true
                ]); 
            }

            $request->session()->flash('info', 'Thanks for signing up! Please check your email.');
            return Redirect::route('client-login', compact('user'));
            
        } catch (LoginRequiredException $e) {
            $error = Lang::get('admin/members/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = Lang::get('admin/members/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = Lang::get('admin/members/message.user_exists');
        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            $error = Lang::get('auth/message.account_not_activated');
        } 

        // Redirect to the user creation page
        if($request->is('api/register')) {
            return response()->json([
                'error' => true,
                'message' => $error,
                'success'=> false
            ]);
        }
        return Redirect::back()->withInput()->with('error', $error);
    }
    public function API_ForgotPassword(Request $request) {
        
        $rules = array(
            'email' => 'required|email',
            'role'  => 'required|string',
        );
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            if($request->is('api/forget-password')) {
                return Response::json($validator->errors()->all(), 200);
            }
            return back()->withInput()->withErrors($validator);
        }

        // Get the user password recovery code
        try {
            $user = User::where('email', '=', $request->email)->firstOrFail();
            $role = $user->roles;

            if($user && $role[0]->slug == $request->role) {
                //get reminder for user -- By Sentinel
                $reminder = Reminder::exists($user);
                if($reminder) {
                    Reminder::complete($user, Reminder::exists($user)->code, Reminder::create($user));
                    $data = array(
                        'user'              => $user,
                        'forgotPasswordUrl' => URL::route('client-reset-password',[$user->id, $reminder->code]),
                    );
                    Mail::send('emails.member-forgot-password', $data, function ($m) use ($user) {
                        $m->to($user->email, ucfirst($user->first_name).' '.ucfirst($user->last_name));
                        $m->from($user['adminemail'], 'Admin');
                        $m->subject('Account Password Recovery');
                    });

                    if($request->is('api/forget-password')) {
                        return Response::json('Check your mailbox, We send you another email.', 200);
                    }
                    return Redirect::route('client-login')->with('info', 'Check your mailbox, We send you another email.');;
                } 
                Reminder::create($user);
                
                if($reminder) {

                }
                return Response::json(Reminder::exists($user)->code, 200);
                // return Response::json($reminder, 200);
                // Data to be used on the email view
                $data = array(
                    'user'              => $user,
                    'forgotPasswordUrl' => URL::route('client-reset-password',[$user->id, $reminder->code]),
                );
                // Send the activation code through email
                $user['adminemail'] = SiteSetting::first()->contact_to_email;
                Mail::send('emails.member-forgot-password', $data, function ($m) use ($user) {
                    $m->to($user->email, ucfirst($user->first_name).' '.ucfirst($user->last_name));
                    $m->from($user['adminemail'], 'Admin');
                    $m->subject('Account Password Recovery');
                });

                if($request->is('api/forget-password')) { 
                    
                    return Response::json('Check your mailbox.', 200);
                }
                return Redirect::route('client-login')->with('info', 'Check your mailbox.');
            }
        } catch(ModelNotFoundException $execption) {
            if($request->is('api/forget-password')) { 
                return Response::json('Email does not exist.', 200);
            }
            return Redirect::to(URL::previous())->with('error', 'Email does not exist.');
        }
    }
    public function myLeads(Request $request) {
        $totalLeads = User::where('id',$request->owner_id)->first();
        if(count($totalLeads->leads) > 0){
            foreach($totalLeads->leads as $key => $lead){
                if($request->leadType && $request->leadType == $lead->pivot->status) {
                    $owner_id  = User::where('id', $lead->owner_id)
                        ->leftJoin('user_details', 'users.id', '=', 'user_details.u_id')
                        ->select('users.*', 'user_details.country_code', 'user_details.phone')
                        ->first();
                    $sub_category_name = SubCategory::where('id', $lead->sub_category_id)->first();
                    $lead->sub_category_id = $sub_category_name->name;
                    $lead->owner = $owner_id;
                    
                    $job[] = $lead;
                }
            }
            return response()->json([
                'error' => false,
                'data' => $job,
                'price' => 500,
                'VAT' => 100,
                'success'=> true
            ]);
        } else {
            return response()->json([
                'error' => false,
                'data' => [],
                'success'=> true
            ]);
        }
    }
    public function myJobs(Request $request) {
        
        $jobs = Job::where('owner_id', $request->owner_id)->with('leadPurchaseBy.userDetails', 'Associated_sub_category')->get();
        
        // isma bhai ka code.. 
        // $totalLeads = User::where('id', $request->owner_id)->first();
        // if(count($totalLeads->jobs) > 0) {
        //     foreach($totalLeads->jobs as $key => $job) {
        //         $job->homeowner;
        //         $job->leadPurchaseBy->userDetails;
        //         $job->Associated_sub_category;
        //         $jobs[] = $job;
        //     }
            
            return response()->json([
                'error' => false,
                'data' => $jobs,
                'success'=> true
            ]);
        // }
    }
    public function categories(Request $request) {
        $cats = Category::where('status',1)->get();
        return response()->json([
            'error' => false,
            'data' => $cats,
            'success'=> true
        ]);
    }
    public function getSubcatByCatId(Request $request){
        $cats = SubCategory::where('category_id',$request->category_id)->get();
        return response()->json([
            'error' => false,
            'data' => $cats,
            'success'=> true
        ]);
    }
    public function getJobsBySubcatId(Request $request){
        $jobs = Job::where('sub_category_id',$request->sub_category_id)->with('Associated_sub_category.Associated_Category')->get();
        return response()->json([
            'error' => false,
            'data' => $jobs,
            'success'=> true
        ]);
    }
    public function getRecentJobs(Request $request){
        if(isset($request->catIds) && $request->catIds!=null && $request->catIds!='null'){

            $sub_cat_ids = SubCategory::select('jobs.*')->whereIn('category_id',$request->catIds)->select('id')->get()->pluck('id');  
            $jobs = Job::whereIn('sub_category_id',$sub_cat_ids)
            ->whereNotIn('jobs.id',function($q2) {
                    $q2->select('job_id')->from('user_reaction');
            })
            ->with('Associated_sub_category.Associated_Category')->orderBy('created_at','DESC')->get();
            return response()->json([
                'error' => false,
                'data' => $jobs,
                'price' => 500,
                'VAT' => 100,
                'success'=> true
            ]);
        } else {
            $jobs = Job::with('Associated_sub_category.Associated_Category')
                ->whereNotIn('jobs.id',function($q2) {
                    $q2->select('job_id')->from('user_reaction');
            })
            ->orderBy('created_at','DESC')->get();
            return response()->json([
                'error' => false,
                'data' => $jobs,
                'price' => 500,
                'VAT' => 100,
                'success'=> true
            ]);
        }
    }
    public function updateWorkAreaSettings(Request $request) {

        if($request->isMethod('post') && Sentinel::check()){
            $is_found = GoogleData::where('user_id', $request->id)->first();
            if(!$is_found){
                GoogleData::create([
                    'user_id'       => $request->id,
                    'coordinates'   => json_encode($request->data),
                ]);
                return response()->json(['statusCode' => 200, 'success' => 'work area successfully save.']);
            } else {
                GoogleData::where('user_id', $request->id)->update([
                    'coordinates'   => json_encode($request->data)
                ]);
                return response()->json(['statusCode' => 200, 'success' => 'work area successfully updated.']);
            }
        } else {
            return response()->json(['statusCode' => 404, 'danger' => 'There is some problem, please contact to administrator.']);
        }
    }
    public function editWorkArea(Request $request) {
        $is_found = GoogleData::where('user_id', $request->id)->first();
        if(!$is_found){
            GoogleData::create([
                'user_id'       => $request->id,
                'coordinates'   => json_encode($request->data),
            ]);
            return response()->json([
                'error' => false,
                'message' => "work area successfully save.",
                'success'=> true
            ]);
        } else {
            GoogleData::where('user_id', $request->id)->update([
                'coordinates'   => json_encode($request->data)
            ]);
            return response()->json([
                'error' => false,
                'message' => "work area successfully updated.",
                'success'=> true
            ]);
        }
  
    }
    public function getCoordinatesByUserId(Request $request){
        $is_found = GoogleData::where('user_id', $request->id)->first();
        if($is_found){
            return response()->json([
                'error' => false,
                'message' => "work area coordinates",
                'data' => $is_found,
                'success'=> true
            ]);
        }else{
            return response()->json([
                'error' => false,
                'message' => "coordinates are not added yet",
                'data' => null,
                'success'=> true
            ]);
        }
    }
    public function editService(Request $request) {
      $user = User::where('id',$request->id)->with('roles')->first();
        if($user->roles[0]->slug == 'tradeperson') {
            if($user->account_setting){
                $setting = AccountSetting::where('user_id', $request->id)->update([
                    'user_id'       => $user->id,
                    'services'      => json_encode($request->services),
                ]);
            } else {
                $setting = AccountSetting::create([
                    'user_id'       => $user->id,
                    'services'      => json_encode($request->services),
                ]);
            }

            return response()->json([
                'error' => false,
                'message' => "service area successfully updated.",
                'success'=> true
            ]);
        }
            return response()->json([
                'error' => false,
                'message' => "you are not a trade person.",
                'success'=> true
            ]);
    } 
    public function contactForm(Request $request) {
        $rules = [
            'name'          => 'required|min:3',
            'email'         => 'required|email',
            'message'       => 'required|max:250',
        ];
        $custom_message = [
            'required'          => 'The :attribute field is required.',
            'email'             => 'We need to know your e-mail address!',
            'min'               => 'At least :attribute characters.',
            'max'               => 'Max :attribute characters.'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => "Make sure you have provided all fields",
                'success'=> false
            ]);
        }
        $data = [
            'name' => $request->name,
            'email'=> $request->email,
            'message'=> $request->message
        ];
            
        $contact = new Contact($data);
        $contact->save();
        return response()->json([
            'error' => false,
            'message' => "We have received your info.",
            'success'=> true
        ]);
    }
    public function editLeadStatus(Request $request) {
        $response = DB::table('user_leads')
            ->where('user_id', $request->user_id)
            ->where('job_id', $request->job_id)
            ->update(['status' => $request->status ]);
                 
        return response()->json([
            'error' => false,
            'data' => $response,
            'success'=> true
        ]);    
    }
    public function myAllLeads(Request $request) {
        $user = User::where('id',$request->owner_id)->first();
        if(count($user->leads) > 0){
            foreach($user->leads as $key => $lead){
                    $owner_id  = User::where('id', $lead->owner_id)
                    ->leftJoin('user_details', 'users.id', '=', 'user_details.u_id')
                    ->select('users.*', 'user_details.country_code', 'user_details.phone')
                    ->first();
                    $sub_category_name = SubCategory::where('id', $lead->sub_category_id)->first();
                    $lead->sub_category_id = $sub_category_name->name;
                    $lead->owner = $owner_id;
                    $job[] = $lead;
                
            }
            return response()->json([
                'error' => false,
                'data' => $job,
                'success'=> true
            ]);
        }
        return response()->json([
            'error' => false,
            'data' => [],
            'success'=> true
        ]);
    }
    
    public function updateTokenNotification(Request $request) {

        try {
            $user = User::where('id', $request->user_id)->with('roles')->firstOrFail();
            $resp = User::where('id', $request->user_id)->update([
                'notificationToken' => $request->notification_token,
            ]);
            
            if($resp) return response()->json([
                "success"       => true,
                "data"          => $user,
                "message"       => "Notification token has been updated."
            ], 200);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                "success"       => false,
                "data"          => [],
                "message"       => "User not found."
            ], 400);
        }
    }
}