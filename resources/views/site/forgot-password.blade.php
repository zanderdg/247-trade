@extends('layouts.site.app')



{{-- Page title --}}

@section('title')

Forgot Password

@parent

@stop



@section('content')



    <section class="signup-section">

        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="main login-dorm pb-4">
    
                        <h3>Recover Password</h3>
    
                        
    
                        @include('notifications')
    
    
    
                        <form action="{{ route('client-forgot-password') }}" method="post">
    
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    
                            <div class="form-group">
    
                                <label for="inputUsernameEmail">Enter Your Email</label>
    
                                <div class="input-container">
    
                                    <i class="fa fa-user "></i>
    
                                    <input type="email" name="email" class="form-control" id="inputUsernameEmail"  placeholder="Enter email here">
    
                                </div>                      
    
                            </div>
    
                            <div class="form-group">
    
                                <div class="input-container">
    
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
    
                                    <select style="width:30.5rem; border:none; outline:none;" id="role" name="role" >
    
                                        <option value="">Select Role</option>
    
                                        @foreach($roles as $role)
    
                                            <option value="{{ old('role', $role->slug) }}">{{ $role->name }}</option>
    
                                        @endforeach
    
                                    </select>
    
                                </div>
    
    
    
                            </div>
    
    
    
                            <div class="sign-up"> 
    
                                <button type="submit" class="cancelbtn">Recover Password</button>
    
                            </div>
    
    
    
                        </form>
    
                    </div>

                </div>


            </div>

        </div>

    </section>



@endsection