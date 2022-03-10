<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Sentinel;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Sentinel::guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                if(Sentinel::check()) {
                    $user = User::where('verify_token', '=', $request->confirmationCode)->first();
                    if($user->userDetails->country_code == null && $user->userDetails->twilio_status == null && $user->userDetails->service_sid == null) {
                        return $next($request);
                    }
                }

                return redirect()->route('client-login');
            }
        }

        return $next($request);
    }
}
