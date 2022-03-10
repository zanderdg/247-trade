<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;

class Homecover
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Sentinel::check()) {
            $user = Sentinel::getUser();
            if($user->roles[0]->slug == 'Homeowner') {
                return $next($request);
            } else {
                return abort(401);
            }
        } else {
            return $next($request);
        }
    }
}
