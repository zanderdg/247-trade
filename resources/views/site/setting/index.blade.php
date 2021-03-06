@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Account Settings
@parent
@stop

@section('head_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .map_div {
            height: 30rem;
            border: 4px solid #39b54c;
        }
        #map {
            height: 100%!important;
        }
        .content-item ul li {
            list-style: disc;
        }
        /*toggle*/
        
        .toggleSwitch span span {
            display: none;
        }

        @media only screen {
        .toggleSwitch {
            display: inline-block;
            height: 18px;
            position: relative;
            overflow: visible;
            padding: 0;
            margin-left: 50px;
            cursor: pointer;
            width: 40px
        }
        .toggleSwitch * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .toggleSwitch label,
        .toggleSwitch > span {
            line-height: 20px;
            height: 20px;
            vertical-align: middle;
        }
        .toggleSwitch input:focus ~ a,
        .toggleSwitch input:focus + label {
                outline: none;
        }
        .toggleSwitch label {
            position: relative;
            z-index: 3;
            display: block;
            width: 100%;
        }
        .toggleSwitch input {
            position: absolute;
            opacity: 0;
            z-index: 5;
        }
        .toggleSwitch > span {
            position: absolute;
            left: -50px;
            width: 100%;
            margin: 0;
            padding-right: 50px;
            text-align: left;
            white-space: nowrap;
        }
        .toggleSwitch > span span {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 5;
            display: block;
            width: 50%;
            margin-left: 50px;
            text-align: left;
            font-size: 0.9em;
            width: 100%;
            left: 15%;
            top: -1px;
            opacity: 0;
        }
        .toggleSwitch a {
            position: absolute;
            right: 50%;
            z-index: 4;
            display: block;
            height: 100%;
            padding: 0;
            left: 2px;
            width: 18px;
            background-color: #fff;
            border: 1px solid #CCC;
            border-radius: 100%;
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .toggleSwitch > span span:first-of-type {
            color: #ccc;
            opacity: 1;
            left: 45%;
        }
        .toggleSwitch > span:before {
            content: '';
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            left: 50px;
            top: -2px;
            background-color: #fafafa;
            border: 1px solid #ccc;
            border-radius: 30px;
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
        }
        .toggleSwitch input:checked ~ a {
            border-color: #fff;
            left: 100%;
            margin-left: -8px;
        }
        .toggleSwitch input:checked ~ span:before {
            border-color: #02b86b;
            box-shadow: inset 0 0 0 30px #02b86b;
        }
        .toggleSwitch input:checked ~ span span:first-of-type {
            opacity: 0;
        }
        .toggleSwitch input:checked ~ span span:last-of-type {
            opacity: 1;
            color: #fff;
        }
        .toggleSwitch.large {
            width: 40px;
            height: 20px;
        }
        .toggleSwitch.large a {
            width: 16px;
            height: 16px;
        }
        .toggleSwitch.large input:checked ~ a {
            left: 41px;
        }
        .toggleSwitch.large > span span {
            font-size: 1.1em;
        }
        .toggleSwitch.large > span span:first-of-type {
            left: 50%;
        }
    }

    </style>
@endsection

@section('head_script')
@endsection

@section('content')
    <section>
        <div class="container my-5">
            <h2>Account Setting</h2>
            <div class="row">
                <div class="col-md-3 _setting_edit_menu">
                    <div class="list-group" id="list-tab" role="tablist">
                        @if(Sentinel::getUser()->roles[0]->slug == 'tradeperson' )
                            <a class="list-group-item list-group-item-action" id="list-General-list" data-toggle="list" href="#list-General" role="tab" aria-controls="General">General</a>
                            {{-- <a class="list-group-item list-group-item-action" id="list-Number-list" data-toggle="list" href="#list-Number" role="tab" aria-controls="Number">Contact Number</a> --}}
                            <a class="list-group-item list-group-item-action " id="list-notification-list" data-toggle="list" href="#list-notification" role="tab" aria-controls="notification">Notification</a>
                        @endif
                        <a class="list-group-item list-group-item-action " id="list-Privacy-list" data-toggle="list" href="#list-Privacy" role="tab" aria-controls="Privacy">Privacy</a>
                    </div>
                    <div class="my-5">
                        @include('notifications')
                        <div id="message"></div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show" id="list-General" role="tabpanel" aria-labelledby="list-General-list">
                            @if($user->roles[0]->slug == 'tradeperson')
                                {{-- Tradeperson edit service --}}
                                <div class="card mb-2" id="queDiv">
                                    <div class="card-header" id="headingOne">
                                        <h3 class="card-title pb-0 m-0">Services<span class="pull-right clickable" id="status" >
                                            {!! isset($account_setting->services) ? '<i class="fa fa-check-circle fa-1x success-icon"></i>' : '<i class="fa fa-exclamation-circle fa-1x danger-icon"></i>' !!}
                                        </span></h3>
                                    </div>
                                    <div id="services" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div id="service-data" class="card-body content-item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h3 class="m-0">Your Expertise</h3>
                                                </div>
                                                <div class="col-4 offset-4 text-right">
                                                    <a href="#" class="btn btn-sm btn-outline-success" id="edit-service">Edit Service</a>
                                                </div>
                                            </div>
                                            <ul class="mt-0">
                                                @if(isset($account_setting->services))
                                                    @foreach ($account_setting->services as $service)
                                                        <li>{{ $service }}</li>
                                                    @endforeach
                                                @else
                                                    <li>Add your expertise.</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tradeperson Map Aera --}}
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h3 class="card-title pb-0 m-0">Radius
                                            <p class="m-0 badge badge-primary">Beta</p>
                                            <span class="pull-right clickable" id="status" >
                                                {!! isset($user->userDetails->lat) && isset($user->userDetails->lng) ? '<i class="fa fa-check-circle fa-1x success-icon"></i>' : '<i class="fa fa-exclamation-circle fa-1x danger-icon"></i>' !!}
                                            </span>
                                        </h3>
                                    </div>
                                    <div>
                                        <div class="card-body" id="notify">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h3 class="m-0">Work Area</h3>
                                                </div>
                                                <div class="col-6 offset-2 text-right edit_work_cus {!! isset($user->userDetails->lat) && isset($user->userDetails->lng) ? '' : 'd-none' !!}">
                                                    <a href="javascript:;" class="btn btn-sm btn-outline-success" id="btn_edit" onclick='initMap(true)'>Edit Work Area</a>
                                                    <a href="javascript:;" class="btn btn-sm btn-outline-danger" id="btn_cancel">Cancel</a>
                                                    <a href="javascript:;" class="btn btn-sm btn-outline-success" id="btn_save">Save Work Area</a>
                                                </div>
                                            </div>
                                            <div class="map_div {!! isset($user->userDetails->lat) && isset($user->userDetails->lng) ? '' : 'd-none' !!}">
                                                <div id="map"></div>
                                            </div>
                                            <div class="alert alert-warning m-0 {{ isset($user->userDetails->lat) && isset($user->userDetails->lng) ? 'd-none' : '' }}" role="alert">
                                                <strong>{{ $user->first_name }}</strong>, please set your location on profile page before you edit your work area.</p>
                                                <hr>
                                                <p class="mb-0">Visit Profile Page: 
                                                    <a href="{{ route("client-profile") }}"> <strong>Profile Page </strong></a>
                                                </p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade show" id="list-Number" role="tabpanel" aria-labelledby="list-Number-list">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h3 class="card-title pb-0 m-0">Contact Number
                                        <span class="pull-right clickable" id="status" >
                                            {!! isset($user->userDetails->phone) && isset($user->userDetails->twilio_status) == 'approved' ? '<i class="fa fa-check-circle fa-1x success-icon"></i>' : '<i class="fa fa-exclamation-circle fa-1x danger-icon"></i>' !!}
                                        </span>
                                    </h3>
                                </div>
                                <div>
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="list-Privacy" role="tabpanel" aria-labelledby="list-Privacy-list">
                            <div class="card mb-2">
                                <div class="card-header" id="headingOne">
                                    <h3 class="card-title pb-0 m-0">Change Password</h3>
                                </div>
                                <div>
                                    <div class="card-body">
                                        <form id="validatedPassForm">
                                            <div class="col-md-6">
                                                <input class="form-control" id="currentPassword" placeholder="Current Password" type="password" name="currentPassword">
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6 pt-3">
                                                        <input class="form-control" id="newPassword" placeholder="New Password" type="password" name="newPassword">
                                                    </div>
                                                    <div class="col-md-6 pt-3">
                                                        <input class="form-control" placeholder="New Confirm Password" type="password" name="newConfirmPassword">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="row mx-1">
                                                    <div class="col-md-6 form-check mt-2">
                                                        <input type="checkbox" class="form-check-input" id="showPassword">
                                                        <label class="form-check-label" for="showPassword">Show password.</label>
                                                    </div>
                                                    <div class="col-md-6 pr-0 text-right">
                                                        <button id="changePassword" type="submit" class="btn btn-success">Update Password</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h3 class="p-0">Want to <strong>delete</strong> your account?</h3>
                                                <p class="m-0">Once you delete an <strong>account</strong>, there is no going back. Please be certain.</p>
                                            </div>
                                            <div class="col-md-3 text-right align-items-center">
                                                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-danger">Delete Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="list-notification" role="tabpanel" aria-labelledby="list-notification-list">
                            <div class="card mb-2">
                                <div class="card-header" id="headingOne">
                                    <h3 class="card-title pb-0 m-0">Notification</h3>
                                </div>
                                <div>
                                    <div class="card-body toggle-switch">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="m-1"><strong>Push Notification</strong></p>
                                            <label class="toggleSwitch large" >
                                            <input class="updateSetting" name="pushNotification" type="checkbox" {!! $user->notification_allowed == 1 ? "checked" : ""  !!} />
                                            <span>
                                                <span></span>
                                                <span></span>
                                            </span>
                                            <a></a>
                                        </label>
                                            <!--<input class="updateSetting" name="pushNotification" type="checkbox" >-->
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="m-1"><strong>Text Notification</strong></p>
                                            <label class="toggleSwitch large" >
                                            <input class="updateSetting" name="textNotification" type="checkbox" {!! $user->sms_allowed == 1 ? "checked" : ""  !!} />
                                            <span>
                                                <span></span>
                                                <span></span>
                                            </span>
                                            <a></a>
                                            <!--<input class="updateSetting" name="textNotification" type="checkbox" {!! $user->sms_allowed == 1 ? checked : ""  !!}>-->
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="m-1"><strong>Email Notification</strong></p>
                                            <label class="toggleSwitch large" >
                                            <input class="updateSetting" name="emailNotification" type="checkbox" {!! $user->email_allowed == 1 ? "checked" : ""  !!} />
                                            <span>
                                                <span></span>
                                                <span></span>
                                            </span>
                                            <a></a>
                                            <!--<input class="updateSetting" name="emailNotification" type="checkbox" {!! $user->email_allowed == 1 ? checked : ""  !!}>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal model-sm fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body"> 
                        <div class="header">
                            <h3 class="modal-title" id="exampleModalLabel">Are you absolutely sure?</h3> 
                        </div>
                        <div class="body mb-3">
                            <p class="m-0">This action cannot be undone. This will permanently delete account. <br> Please type <strong id="value">{{ $user->first_name }}</strong> to confirm.</p>
                            <input id="inputValue" class="form-control" aria-label="Small" type="text">
                        </div>
                        <div class="footer text-center">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                            <button id="delAccount" type="button" class="btn btn-sm btn-outline-danger">I understand the consequences, delete this account</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>

@endsection

@section('footer_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('Google_MAP_KEY') }}&libraries=&v=weekly" defer ></script>
    <script src="{{ asset('assets/front_lib/js/jquery-validation.js')}}" ></script>
    <script src="{{ asset('assets/front_lib/js/additional-methods.js')}}" ></script>
    <script src="{{ asset('assets/front_lib/js/map.js') }}"></script>
    <script src="{{ asset('assets/front_lib/js/account_request.js') }}"></script>
    <script>
        $('#list-tab a:first-child').tab('show')
    </script>
@endsection