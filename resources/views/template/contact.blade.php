{{-- * Template Name : Contact-us * --}}

@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Contact
@parent
@stop

@section('content')

    <!-- signup section start -->
    <section class="contact-section">
        <div class="container">
        {{-- <div class="row">
            <div class="image-wrap">
            <div class="img-content">
                <img src="{{ asset('assets/front_lib/images/Banner-1.png')}}" alt="">
            </div>
            <div class="overlay"></div>
        </div> --}}
        <div class="banner-content">
            <h3>NEED MORE HELP?</h3>
                <p class="text-uppercase">"get in touch today and our team wil be happy to answer any question you may have"</p>
            </div>
            {{-- </div> --}}
        </div>
    </section>

    <section class="signup-section contact-sss">
        <div class="container">
        <div class="row">
            <div class="main login-dorm contact-foo">
            <h3>Contact Form</h3>
            <!-- errors -->
            <div class="has-error">
                {!! $errors->first('name', '<span class="help-block text-danger">:message</span> <br/>') !!}
                {!! $errors->first('email', '<span class="help-block text-danger">:message</span> <br/>') !!}
                {!! $errors->first('message', '<span class="help-block text-danger">:message</span> <br/>') !!}
            </div>
            <form action="{{ route('create/contact') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="inputUsername">Enter Your Name</label>
                    <div class="input-container">
                        <i class="fa fa-user"></i>
                        <input type="text" name="name" class="form-control" id="inputUsername" value="{{ old('name') }}" placeholder="Enter name here"...>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUsernameEmail">Enter Your Email</label>
                    <div class="input-container">
                        <i class="fa fa-user "></i>
                        <input type="email" name="email" class="form-control" id="inputUsernameEmail" value="{{ old('email') }}" placeholder="Enter email here"...>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Enter Your Message</label>
                    <div class="input-container">
                        <textarea style="resize: none;" class="form-control" name="message" rows="5" id="comment" placeholder="Enter your message here...">{{ old('message') }}</textarea>
                    </div>
                </div>
                <div class="sign-up"> 
                    <button type="submit" class="cancelbtn">SEND</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
    <!-- signup section end -->
@endsection