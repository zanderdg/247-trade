<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class EmailAndPhoneVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        // Check Email ID
        if(Sentinel::check() && Sentinel::getUser()->email_verified_at == null && Sentinel::getUser()->verify_token != null){
            // Twilio Status and country_code
            if(Sentinel::getUser()->userDetails->country_code != null && Sentinel::getUser()->userDetails->twilio_status == 'pending'){
                return redirect()->route('client-dashboard');
            } elseif (Sentinel::getUser()->userDetails->country_code == null && Sentinel::getUser()->userDetails->twilio_status == null){
                Sentinel::logout();
                return redirect()->route('client-login')->with('error', 'You need to complete the verification process.');
            }
        }     

        return $next($request);
    }
}
