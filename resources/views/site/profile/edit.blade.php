@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Edit Profile
@parent
@stop

@section('head_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/css/intlTelInput.css" />
    <style>
        #sync button.owl-prev{
            bottom: 0;
            /* position: relative; */
            left: 0;
            top: 0;
        }
        #sync button.owl-next{
            bottom: 0;
            /* position: relative; */
            right: 0;
            left: unset;
            top: 0;
        }
        #sync .owl-nav {
            position: relative;
        }
        #sync .owl-nav button {
            font-size: 0;
            border: 0;
            background: transparent;
        }
        #sync .owl-nav button span {
            font-size: 0;
            border: 0;
        }
        #sync .owl-item {
            padding: 0 !important;
        }
        #sync .nav-btn.prev-slide {
            color: #fff;
            position: absolute;
            font-size: 20px;
            background-color: grey;
            padding: 0px 25px;
            /* right: 100px; */
            margin-right: 10px;
        }
        #sync .nav-btn.next-slide {
            color: #fff;
            position: absolute;
            right: 0;
            font-size: 20px;
            background-color: green;
            padding: 0px 25px;
        }
        #sync .items img {
            width: 100% !important;
            height: 210px !important;
        }
        button.owl-prev.disabled {
            display: none;
        }
        
        .image-holder>img {
            width: 250px;
            height: auto;
        }
        .image-holder {
            width: 250px;
            height: 250px;
            position: relative;
            border-radius: 50%;
            overflow: hidden;
            border: rgb(3, 163, 110) 4px solid;
            transition: linear 1s;
            margin: 0 auto;
        }
        .image-holder:hover:after {
            content: "Upload Image";
            text-align: center;
            color: #fff;
            font-family: cursive;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 800;
            padding-top: 30px;
            transform: translateY(60%);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 1;
            cursor: pointer;
        }
        .verify-modal {
            padding: 0;
        }
        p.status {
            margin: 0;
            display: inline;
        }
        .min-h-5 {
            height: 15rem;
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

@section('content')
    <div class="container my-5">
        @include('notifications')
        <div id="status"></div>
        {{-- {{ $errors }} --}}
        <form action="{{ route('update-profile', $user->id) }}" method="POST" id="submitProfile">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-lg-3">
                    <div class="image-holder" id="proFileImage">
                        <img id="updateAvatar" src="{{ asset('assets/uploads/profilesImage') .'/'.Sentinel::getUser()->userDetails->picture }}">
                    </div>
                    <input type="file" id="imgupload" onchange="readURL(this)" style="display: none" />
                    <div id="errors"></div>
    
                    <div class="list-group my-3">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Profile Image (Instruction)</h5>
                            </div>
                            <ul class="p-0 m-0">
                                <li><small>Image should be less then 1 MB.</small></li>
                            </ul>
                        </a>
                    </div>
                </div>
    
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-4">
                            <h3>Profile Info</h3>
                        </div>
                        <div class="col-4 offset-4 text-right">
                            <a href="{{ route('client-profile') }}" class="btn btn-outline-success">Go Back</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUsernameEmail">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputUsername">First Name</label>
                                <input type="text" class="form-control  @if($errors->has('fname')) is-invalid @endif" name="fname" value="{{ old('fname', $user->first_name) }}" id="inputUsername" placeholder="Enter name here...">
                            </div>
                            @if($errors->has('fname'))
                            <div id="fname" class="invalid-feedback">
                                {{ $errors->first('fname') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputUsername">Last Name</label>
                                <input type="text" class="form-control @if($errors->has('lname')) is-invalid @endif" name="lname" value="{{ old('lname', $user->last_name) }}" id="inputUsername" placeholder="Enter name here...">
                            </div>
                            @if($errors->has('lname'))
                            <div id="lname" class="invalid-feedback">
                                {{ $errors->first('lname') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" id="biography">
                        <label for="inputUsernameEmail">Personal Description (Optional)</label>
                        <textarea class="form-control resize-none @if($errors->has('bio')) is-invalid @endif" id="bio" cols="15" rows="10" name="bio">{{$user->userDetails->bio }}</textarea>
                    </div>
                    @if($errors->has('bio'))
                        <div id="bio" class="invalid-feedback">
                            {{ $errors->first('bio') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="inputUsernameEmail">I want to be a</label>
                        <input name="role" type="text" class="form-control" value="{{ $user->roles[0]->name }}" readonly />
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-12 col-lg-9">
                            <div class="card shadow-sm mb-md-3" id="Mailing_Address">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h3 class="card-title">Mailing Address</h3>
                                            <label class="mt-3" for="stateInput">Street Address (Optional)</label>
                                        </div>
                                        @if(Sentinel::getUser()->roles[0]->slug == 'tradesperson')
                                        <div class="col-6">
                                            <div class="alert alert-info">
                                                <p class="m-0">Select your address from suggested dropdown.</p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @if($errors->has('address')) is-invalid @endif" name="address" value="{{ old('state', $user->userDetails->address) }}" id="stateInput" placeholder="Enter address here">
                                        @if($errors->has('address'))
                                        <div id="address" class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 pl-0">
                                                <div class="form-group">
                                                    <label for="stateInput">Town</label>
                                                    <input type="text" class="form-control" name="state" value="{{ old('state', $user->userDetails->state) }}" id="administrative_area_level_1" placeholder="Enter Town here...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0">
                                                <div class="form-group">
                                                    <label for="cityInput">City</label>
                                                    <input type="text" class="form-control @if($errors->has('city')) is-invalid @endif" name="city" value="{{ old('city', $user->userDetails->city) }}" id="locality" placeholder="Enter city here...">
                                                    @if($errors->has('city'))
                                                    <div id="city" class="invalid-feedback">
                                                        {{ $errors->first('city') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 pl-0">
                                                <div class="form-group">
                                                    <label for="postCode">Post Code<span>*</span></label>
                                                    <input type="text" class="form-control @if($errors->has('postal')) is-invalid @endif" name="postal" value="{{ old('postal', $user->userDetails->postal) }}" id="postal_code" placeholder="Enter Postal here...">
                                                    @if($errors->has('postal'))
                                                    <div id="postal" class="invalid-feedback">
                                                        {{ $errors->first('postal') }}
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2 p-0 text-right">
                <input type="submit" class="btn btn-success" value="Update Profile">
            </div>
        </form>
    </div>
    
    @include('site.profile.user_experience.profile_follow', ['user_experience' => $user->user_experience])
@endsection

@section('footer_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/intlTelInput.min.js"></script>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            uiLibrary: 'bootstrap'
        });
        ! function() {
            var ulContent;
            $(document).ajaxStop(function() {
                var $ul = $('.iti__selected-flag');
                if (ulContent !== $ul.html()) {
                    ulContent = $ul.html();
                    $ul.trigger('contentChanged');
                }
            });
        }();
        $('#proFileImage').on('click', function() {
            $('#imgupload').trigger('click');
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                $image = '';
                reader.onload = function(e) {
                    $('#updateAvatar').attr('src', e.target.result);
                    $.ajax({
                        url: '{{ url("account/profile/update-avatar") }}',
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: '{{ $user->id }}',
                            data: e.target.result,
                            type: input.files[0].type
                        },
                        success: function(data) {
                            if (data.success) {
                                location.reload();
                            }
                        },
                        errors: function(data) {
                            console.log(data.errors);
                            $('#status').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> ' + data.success + ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </div>');
                        }
                    });
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        
        const queryString = new URLSearchParams(window.location.search)
        if(queryString.get('active') == 'modal' && queryString.get('log') == 'true') {
            $('#user_expr').modal('show');
        }
        
        function ux_completed(event) {
            $.get('/account/user-experience')
            .then(res => {
                $('#user_expr').modal('hide');
                window.location.href = '/account/profile/'+res.id+'/edit';
            })
        }
    
        $('.sync-content').css('opacity', "0")
        $(document).ready(function() {
    
            var owl = $('#sync');
            owl.owlCarousel({
                loop: false,
                navRewind: false,
                nav: true,
                navText: ["<div class='nav-btn prev-slide'>Back</div>", "<div class='nav-btn next-slide'>Next</div>"],
                items: 1
            });
    
            setTimeout(() => {
              $('.sync-content').css('opacity', "1")
            }, 500);
    
            owl.on('translated.owl.carousel', function(event) {
                if(event.item.count-1 <= event.item.index) {
                    document.querySelector('.owl-next div').innerHTML = 'Finish';
                    document.querySelector('.owl-next div').classList.add('finish');
                    document.querySelector('.owl-next div').setAttribute('onclick', 'ux_completed(event)');
                } else {
                    document.querySelector('.owl-next div').innerHTML = 'Next';
                    document.querySelector('.owl-next div').classList.remove('finish');
                    if(document.querySelector('.owl-next div').getAttribute('onclick') !== null) document.querySelector('.owl-next div').removeAttribute('onclick');
                }
            });
        });
        
    </script>
@endsection