<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\BusinessUnit;
use App\Models\Capability;
use App\Models\SiteSetting;
use Validator;
use Mail;
use App\Models\MemberMembership;
// use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // mail($to,$subject,$txt,$headers);
        
        // $user = array(
        //         'first_name'    => 'hussain',
        //         'last_name'     => 'arif',
        //         'full_name'     => 'hussain',
        //         'email'         => 'test-av304xugh@srv1.mail-tester.com',
        //         'token'         => 'arif'
        //     );
        // Mail::send('emails.register', compact('user'), function ($m) use ($user){
        //     $m->to($user['email'], $user['full_name'])->subject('test mail1111');
        // });

        // \URL::forceSchema('https');

        // \Blade::directive('svg', function($arguments) {            

        //     // dd($arguments);
        //     // Funky madness to accept multiple arguments into the directive
        //     list($path, $class) = array_pad(explode(',', trim($arguments, "() ")), 2, '');
        //     $path = trim($path, "' ");
        //     dd($path);
        //     $class = trim($class, "' ");
    
        //     // Create the dom document as per the other answers
        //     $svg = new \DOMDocument();
        //     $svg->load(url('/').'/public/uploads/icons/'.($path));
        //     $svg->documentElement->setAttribute("class", $class);
        //     $output = $svg->saveXML($svg->documentElement);
    
        //     return $output;
        // });


        Validator::extend('check_actual_price', function($attribute, $value, $parameters, $validator) {

            //print_r($parameters);exit;
            // if(!empty($value) && (strlen($value) % 2) == 0){
            //     return true;
            // }
            //     return false;
            $MembersMembership = new MemberMembership();
            $allmemberships = $MembersMembership->where('mm_id', $parameters[0])->get();
            if($value<($allmemberships[0]->actual_total_amount/2)){return false;}else{return true;}
            
        });
        
        // $capabilitiesData = [];
        // $business_units   = BusinessUnit::get();
        // $capabilities     = Capability::where('status', 1)->get();

        // $counter = 0;
        // foreach ($business_units as $business_unit) {
        //     $capabilitiesData[$counter]['text'] = $business_unit->name;
        //     $capabilitiesData[$counter]['slug'] = $business_unit->slug;
        //     $capabilitiesData[$counter]['type'] = 'business_unit';

        //     foreach ($capabilities as $capability) {
        //         if ($capability->business_unit_id == $business_unit->id) {
        //             $counter++;
        //             $capabilitiesData[$counter]['text'] = $capability->title;
        //             $capabilitiesData[$counter]['slug'] = $capability->slug;
        //             $capabilitiesData[$counter]['type'] = 'capability';
        //         }
        //     }

        //     $counter++;
        // }

        // $capabilitiesPerColumn = ceil(count($capabilitiesData)/3);

        // view()->share('capabilitiesData', $capabilitiesData);
        // view()->share('capabilitiesPerColumn', $capabilitiesPerColumn);
        
        view()->share('site_settings', SiteSetting::first());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
