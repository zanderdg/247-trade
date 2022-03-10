<?php

namespace App\Http\Middleware;

use Closure;
use Gate;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Routing\Route;
use Redirect;

class RoleAndPermissionMiddleware
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
         //dd(Sentinel::check()); //---> this is always false
        if (Sentinel::check()) {
            // dd( $request->route()->getName());
            //$request->route()->getName();
            //return Redirect::route('dashboard');
            //return redirect('admin');
            if($request->route()->getName() != '') {
                if(Sentinel::hasAccess($request->route()->getName())) {
                    //echo 'asas';
                    return $next($request);
                    //echo $request->route()->getName();
                }   //else{ echo 'asa0099';} //return redirect()->route('color'); //return Redirect::route('register2');
                else{
                    return Redirect::to('admin/access_forbidden');
                }
            }
        }
        else {
            //return Redirect::route('index')->withErrors(['fail', 'Nemate prava na pristup ovim stranicama!']); //return redirect('admin/page');
            return Redirect::to('admin/signin')->with('error', 'You must be logged in!');
        }

        return $next($request);
    }
}
