@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Registration
@parent
@stop

@section('content')
    
    <!-- signup section start -->

    <section class="signup-section">
        <div class="container">
            <div class="main">
                <h3>Sign up</h3>

                @include('notifications')

                <form id="signupFrom" role="form" action="{{ route('client-registration') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <div class="input-container" id="first_name">
                                    <i class="fa fa-user "></i>
                                    <input type="text" class="form-control @if($errors->registration->first('first_name')) is-invalid @endif" name="first_name" value="{{ old('first_name') }}" placeholder="Enter name here...">
                                </div>
                                @if($errors->registration->first('first_name'))
                                    <div id="first_name" class="invalid-feedback">
                                        {{ $errors->registration->first('first_name') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <div class="input-container" id="last_name" >
                                    <i class="fa fa-user "></i>
                                    <input type="text" class="form-control @if($errors->registration->first('last_name')) is-invalid @endif" name="last_name" value="{{ old('last_name') }}" placeholder="Enter name here...">
                                </div>
                                @if($errors->registration->first('last_name'))
                                    <div id="last_name" class="invalid-feedback">
                                        {{ $errors->registration->first('last_name') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Your Email</label>
                        <div class="input-container" id="email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input type="email" class="form-control @if($errors->registration->first('email')) is-invalid @endif" name="email" value="{{ old('email') }}" placeholder="Enter email here"...>
                        </div>
                        @if($errors->registration->first('email'))
                            <div id="email" class="invalid-feedback">
                                {{ $errors->registration->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Enter Your Password</label>
                        <div class="input-container" id="password">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" class="form-control @if($errors->registration->first('password')) is-invalid @endif" name="password" placeholder="Enter password here">
                        </div> 
                        @if($errors->registration->first('password'))
                            <div id="password" class="invalid-feedback">
                                {{ $errors->registration->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Enter Confirm Password</label>
                        <div class="input-container" id="confirm_password">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" class="form-control @if($errors->registration->first('confirm_password')) is-invalid @endif" name="confirm_password" placeholder="Enter password here"...>
                        </div>
                        @if($errors->registration->first('confirm_password'))
                            <div id="confirm_password" class="invalid-feedback">
                                {{ $errors->registration->first('confirm_password') }}
                            </div>
                        @endif
                    </div>
                    
                    @if(!session()->has('jobPost'))
                        <div class="form-group">
                            <label for="role">Account type*</label>
                            <div class="input-container">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <select style="width:30.5rem; border:none; outline:none; @if($errors->registration->first('role')) is-invalid @endif" id="role" name="role" >
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ old('role', $role->slug) }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->registration->first('role'))
                                <div id="role" class="invalid-feedback">
                                    {{ $errors->registration->first('role') }}
                                </div>
                            @endif
                        </div>
                    @else
                    @endif
                
                    <div class="sign-up"> 
                        <button type="submit" class="cancelbtn">Create Account</button>
                    </div>
                    <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">or</span>
                    </div>
                    <div class="text-form"><a href="{{ route('client-login') }}">Login</a></div>
                </form>
            </div>
        </div>
    </section>
  <!-- signup section end -->
@endsection