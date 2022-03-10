<?php 

namespace App\Http\Controllers;

use URL;
use Mail;
use View;
use Lang;
use Input;
use Session;
use Sentinel;
use Reminder;
use Redirect;
use Validator;
use App\Models\RoleUser;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use \Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use \Cartalyst\Sentinel\Checkpoints\ThrottlingException;


class AuthController extends AWController {
    public function __consturct() 
    {
        $this->middleware('auth');
    }

    /**
     * Account sign in.
     *
     * @return View
     */
    public function getSignin()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }

        // Show the page
        return View('admin.login');
    }

    /**
     * Account sign in form processing.
     *
     * @return Redirect
     */
    public function postSignin()
    {
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
            $auth = Sentinel::authenticate(Input::only('email', 'password'), Input::get('remember-me', false));
            //print_r($auth);echo '==========';
            //$r = Sentinel::findById($auth->id)->roleUser;
            //print_r($r);
            if($auth){
                 $role = new RoleUser;
            
                 $chkrole = $role->where('user_id', $auth->id)->first();
                // print_r($chkrole);
                // $pageContent = $page->where('slug', 'home')->first();
                // exit;
                if($auth && $chkrole)
                {
                    $explode_email = explode('@',Input::get('email'));
                    $username = $explode_email[0];
                    $loginforum = 1;
                    // Redirect to the dashboard page
                    return Redirect::route("dashboard")
                            ->with('success', Lang::get('auth/message.signin.success'))
                            ->with('username', $username)
                            ->with('mypass', Input::get('password'))
                            ->with('loginforum',$loginforum);
                }else {
                    Sentinel::logout();
                }
            }   

            $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));

        } catch (NotActivatedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended', compact('delay' )));
        }

        // Ooops.. something went wrong
        return back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postSignup()
    {
        // Declare the rules for the form validation
        $rules = array(
            'first_name'       => 'required|min:3',
            'last_name'        => 'required|min:3',
            'email'            => 'required|email|unique:users',
            'email_confirm'    => 'required|email|same:email',
            'password'         => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous() . '#toregister')->withInput()->withErrors($validator);
        }

        try {
            // Register the user
            $user = Sentinel::registerAndActivate(array(
                'first_name' => Input::get('first_name'),
                'last_name'  => Input::get('last_name'),
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
            ));

            //add user to 'User' group
            $role = Sentinel::findRoleById(2);
            $role->users()->attach($user);


            /*
            //un-comment below code incase if user have to activate manually

            // Data to be used on the email view
            $data = array(
                'user'          => $user,
                'activationUrl' => URL::route('activate', $user->getActivationCode()),
            );

            // Send the activation code through email
            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Welcome ' . $user->first_name);
            });

            //Redirect to login page
            return Redirect::to("admin/login")->with('success', Lang::get('auth/message.signup.success'));

            */

            // login user automatically

            

            // Log the user in
            Sentinel::login($user, false);

            // Redirect to the home page with success menu
            return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signup.success'));

        } catch (UserExistsException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     * @return
     */
    public function getActivate($userId, $activationCode = null)
    {
        // Is user logged in?
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }

        $user = Sentinel::findById($userId);
        $activation = Activation::create($user);

        if (Activation::complete($user, $activation->code))
        {
            // Activation was successful
            // Redirect to the login page
            return Redirect::route('signin')->with('success', Lang::get('auth/message.activate.success'));
        }
        else
        {
            // Activation not found or not completed.
            $error = Lang::get('auth/message.activate.error');
            return Redirect::route('signin')->with('error', $error);
        }

    }

    /**
     * Forgot password form processing page.
     *
     * @return Redirect
     */
    // public function postForgotPassword()
    // {
    //     // Declare the rules for the validator
    //     $rules = array(
    //         'email' => 'required|email',
    //     );

    //     // Create a new validator instance from our dynamic rules
    //     $validator = Validator::make(Input::all(), $rules);

    //     // If validation fails, we'll exit the operation now.
    //     if ($validator->fails()) {
    //         // Ooops.. something went wrong
    //         return Redirect::to(URL::previous() . '#toforgot')->withInput()->withErrors($validator);
    //     }

    //     // Get the user password recovery code
    //     $user = Sentinel::findByCredentials(['email' => Input::get('email')] );

    //     if($user)
    //     {
    //         //echo '1111111';
    //         //get reminder for user
    //         $reminder = Reminder::exists($user) ?: Reminder::create($user);

    //         // Data to be used on the email view
    //         $data = array(
    //             'user'              => $user,
    //             'forgotPasswordUrl' => URL::route('forgot-password-confirm',[$user->id, $reminder->code]),
    //         );

    //         // Send the activation code through email
    //         Mail::send('emails.forgot-password', $data, function ($m) use ($user) {
    //             $m->to($user->email, $user->first_name . ' ' . $user->last_name);
    //             $m->subject('Account Password Recovery');
    //         });
    //         //print_r($data);
    //         //print_r($user);
    //     }
    //     else
    //     {
    //         //echo '222222';
    //         // Even though the email was not found, we will pretend
    //         // we have sent the password reset code through email,
    //         // this is a security measure against hackers.
    //     }

    //     //  Redirect to the forgot password
    //     return Redirect::to(URL::previous() . '#toforgot')->with('success', Lang::get('auth/message.forgot-password.success'));
    // }

    /**
     * Forgot Password Confirmation page.
     *
     * @param number $userId
     * @param  string $passwordResetCode
     * @return View
     */
    // public function getForgotPasswordConfirm($userId,$passwordResetCode = null)
    // {
    //     // Find the user using the password reset code
    //     if(!$user = Sentinel::findById($userId))
    //     {
    //         // Redirect to the forgot password page
    //         return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
    //     }


    //     // Show the page
    //     return View('admin.auth.forgot-password-confirm');
    // }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param number $userId
     * @param  string   $passwordResetCode
     * @return Redirect
     */
    // public function postForgotPasswordConfirm($userId, $passwordResetCode = null)
    // {
    //     // Declare the rules for the form validation
    //     $rules = array(
    //         'password'         => 'required|between:3,32',
    //         'password_confirm' => 'required|same:password'
    //     );

    //     // Create a new validator instance from our dynamic rules
    //     $validator = Validator::make(Input::all(), $rules);

    //     // If validation fails, we'll exit the operation now.
    //     if ($validator->fails()) {
    //         // Ooops.. something went wrong
    //         return Redirect::route('forgot-password-confirm', $passwordResetCode)->withInput()->withErrors($validator);
    //     }

    //     // Find the user using the password reset code
    //     $user = Sentinel::findById($userId);
    //     if(!$reminder = Reminder::complete($user, $passwordResetCode,Input::get('password')))
    //     {
    //         // Ooops.. something went wrong
    //         return Redirect::route('signin')->with('error', Lang::get('auth/message.forgot-password-confirm.error'));
    //     }

    //     // Password successfully reseted
    //     return Redirect::route('signin')->with('success', Lang::get('auth/message.forgot-password-confirm.success'));
    // }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        // Log the user out
        Sentinel::logout();

        // Redirect to the users page
        return Redirect::to('administrator/signin')->with('success', 'You have successfully logged out!');
    }

    /**
     * Account sign up form processing for register2 page
     *
     * @return Redirect
     */
    public function postRegister2()
    {
        // Declare the rules for the form validation
        $rules = array(
            'first_name'       => 'required|min:3',
            'last_name'        => 'required|min:3',
            'email'            => 'required|email|unique:users',
            'email_confirm'    => 'required|email|same:email',
            'password'         => 'required|between:3,32',
            'password_confirm' => 'required|same:password',
            'terms'            => 'accepted',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($validator);
        }
        try {
            // Register the user
            $user = Sentinel::registerAndActivate(array(
                'first_name' => Input::get('first_name'),
                'last_name'  => Input::get('last_name'),
                'email'      => Input::get('email'),
                'password'   => Input::get('password'),
            ));

            //add user to 'User' group
            $role = Sentinel::findRoleById(2);
            $role->users()->attach($user);


            /*
            //un-comment below code incase if user have to activate manually

            // Data to be used on the email view
            $data = array(
                'user'          => $user,
                'activationUrl' => URL::route('activate', $user->getActivationCode()),
            );

            // Send the activation code through email
            Mail::send('emails.register-activate', $data, function ($m) use ($user) {
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Welcome ' . $user->first_name);
            });

            //Redirect to login page
            return Redirect::to("admin/login")->with('success', Lang::get('auth/message.signup.success'));

            */

            // login user automatically

            

            // Log the user in
            Sentinel::login($user, false);

            // Redirect to the home page with success menu
            return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signup.success'));

        } catch (UserExistsException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

}
