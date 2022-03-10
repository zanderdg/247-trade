<?php

namespace App\Http\Controllers;

use Sentinel;
use stdClass;
use Stripe\Token;
use Stripe\Stripe;
use App\Models\Job;
use App\Models\User;
use App\Http\Requests;
use App\Models\Checkout;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CheckoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['mobileCheckout', 'successMobile']]);
    }
    
    public function checkout($jobId) {        
        if(Sentinel::getUser()->roles[0]->slug == 'homeowner') {
            return Redirect::back()->with(['error' => "Home Owner can't purchase a job."]);
        } elseif(Sentinel::getUser()->roles[0]->slug == 'tradeperson') {
            try {
                $job = Job::where('publish', 1)
                    ->leftJoin('sub_categories', 'jobs.sub_category_id', '=', 'sub_categories.id')
                    ->where('jobs.id', $jobId)
                    ->select('jobs.*', 'sub_categories.name')
                    ->first();

                try {
                    $x = $this->encryptJobInfo($job->id);

                    $data = new stdClass();
                    $data->amount = 600;
                    $data->currency = "GBP";
                    $data->description = $x;
                    $data->receipt_email = Sentinel::getUser()->email;
                    
                    $paymentIntent = $this->createPaymentIntent($data);            
                    return view('site.checkout.index', compact('job', 'paymentIntent'))->with(['info' => 'Need to login or register.']);
                } catch(\Execption $execption) {
                    return Redirect::back()->with('error', 'Something get worng, please reload the page.');
                }

            } catch(ModelNotFoundException $execption) {
                return Redirect::route('live-leads')->with('error', 'Job has been removed.');
            }
        } else {
            return Redirect::back()->with(['info' => 'Need to login or register your self.']);
        }
    }

    public function encryptJobInfo($jobId) {
        $jobId = '733'.$jobId.'_con_as13dASa3sdS75Dd';
        return $jobId ;
    }
    public function createPaymentIntent($data) {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        return PaymentIntent::create ([
            "amount" => $data->amount,
            "currency" => $data->currency,
            "description" => $data->description,
            "receipt_email" => $data->receipt_email
        ]);
    }
    public function storePaymentDetails(Request $request) {
        if(Sentinel::getUser()->roles[0]->slug == 'tradeperson') {

            if($request->paymentIntent['status'] == "succeeded") {

                $paymentIntent = $request->paymentIntent;
                $inCode = explode("_", $paymentIntent['description']);
                $outCode = substr($inCode[0], 3);

                // Checkout Model
                Checkout::create([
                    'user_id'           => Sentinel::getUser()->id,
                    'job_id'            => $outCode,
                    'stripe_token'      => $paymentIntent['id'],
                    'response_status'   => $paymentIntent['status'],
                    'amount'            => $paymentIntent['amount'],
                ]);

                // attach lead with user.
                $lead = Job::find($outCode);
                $tradepeople = User::find(Sentinel::getUser()->id);
                $tradepeople->leads()->attach($lead, ['status' => 'new']);

                session()->flash('success', 'Lead purchase successfully.');
                return response()->json(['statusCode' => 200]);
            } else {

                return response()->json(['statusCode' => 400, 'error' => 'something get worng']);
            }
            // return Redirect::route('client-dashboard')->with(['success' => 'Lead purchase successfully.', 'data' => $request]);
        } else {
            return redirect()->back()->with(['info' => 'Only tradePeople can buy a lead.']);
        }
    }
    
    // API Functionality
    public function mobileCheckout(Request $request) {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $tradeperson = User::where('id',$request->user_id)->first();

        $stripeCustomer = $stripe->customers->create([
            'email' => $tradeperson->email,
            'card' => $request->json("id")
        ]);
        $charge = $stripe->charges->create([
            'amount' => 600,
            'currency' => 'GBP',
            'description' => 'My First Test Charge (created for API docs)',
            'customer'=> $stripeCustomer->id
        ]);
        $checkout =  Checkout::create([
            'user_id'           => $request->user_id,
            'job_id'            => $request->job_id,
            'stripe_token'      => $charge['id'],
            'response_status'   => $charge['status'],
            'amount'            => $charge['amount'],
        ]);
    
        $lead = Job::find($request->job_id);
        $tradepeople = User::find($request->user_id);
        $tradepeople->leads()->attach($lead, ['status' => 'new']);
        
        return response()->json([
            'error' => false,
            'checkout_id' => $checkout->id,
            'redirect' => 'api/success',
            'success'=> true
        ]);
    }
    public function successMobile(Request $request){
        //  return view('success');
        // return response()->json([
        //     'error' => false,
        //     'data' => [],
        //     'message'=>'amount paid',
        //     'success'=> true
        // ]);
    }
}
