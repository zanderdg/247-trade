<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = 'login'; 

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath($request)
    {
        // Logic that determines where to send the user
        if ($this->auth->check() &&
            (Auth::user()->user_type == 'Owner') || Auth::user()->user_type == 'Staff') {
            return route('admin.dashboard');
        } elseif ($this->auth->check() &&
            Auth::user()->user_type == 'Contractor') {
            return route('contractor.dashboard');
        } else {
            if ($request->session()->has('checkout')) {
                $request->session()->forget('checkout');
                return route('checkout.order');
            }
            return route('customer.dashboard');
        }
    }

    public function postLogin(Request $request)
    {
        $adminLogin = $request->get('adminLogin');

        $username = $request->get('username');
        $password = $request->get('password');

        if ($this->auth->attempt(
            ['email' => $username, 'password' => $password, 'is_active' => 1],
            $request->has('remember')
        )) {
            $request->session()->put('sessionId', $this->auth->user()->id);
            return redirect($this->redirectPath($request));
        }

        return redirect($this->loginPath($adminLogin))
                ->withInput($request->only('username', 'remember'))
                ->withErrors([
                    'username' => $this->getFailedLoginMessage(),
                ]);
    }

    public function getLogout(Request $request)
    {
        if ($this->auth->check()) {
            $redirectPath = Auth::user()->user_type == 'Customer' ? route('home') : route('admin');
            $request->session()->forget('sessionId');
            $this->auth->logout();

            return redirect($redirectPath);
        }

        return redirect()->route('home');
    }

    public function loginPath($adminLogin = '')
    {
        return $adminLogin == 1 ? '/admin' : '/admin';
    }
}
