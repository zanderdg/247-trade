@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Login
@parent
@stop

@section('content')

    <section class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main login-dorm">
                        <h3>Login to your account</h3>
                        
                        {{-- message --}}
                        @include('notifications')
                        
                        <form action="{{ route('client-login') }}" method="post" id="login-form">
    
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label for="inputUsernameEmail">Enter Your Email</label>
                                <div class="input-container">
                                    <i class="fa fa-user "></i>
                                    <input type="email" name="email" class="form-control" id="inputUsernameEmail"  placeholder="Enter email here"...>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Enter Your Password</label>
                                <div class="input-container">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter password here"...>
                                </div>
                            </div>
                            <div class="sign-up "> 
                                <button type="submit" class="cancelbtn">LOGIN</button>
                            </div>
                             <div class="text-form mt-3">
                                <a href="{{ route('client-forgot-password') }}">Forgot Password</a>
                            </div>
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or">or</span>
                            </div>
                            <div class="text-form mb-2"> 
                                <a href="{{ route('client-registration') }}">Sign up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer_script')
    
    

@endsection