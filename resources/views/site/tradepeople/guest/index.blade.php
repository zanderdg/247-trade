@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
    {{ $user->first_name }}'s Profile
@parent
@stop

@section('head_style')
    <style>
        .helper-detail {
            box-shadow: 0 0 0 1px #eaeaea;
            margin: 60px auto;
        }

        .section-wrapper {
            padding: 20px;
            border-bottom: 1px solid #eaeaea;
        }

        .sticky-sidebar {
            padding: 20px !important;
            margin: 0;
            position: sticky;
            top: 0px;
            bottom: auto;
            border: unset;
        }

        .left-col-block {
            border-right: 1px solid #eaeaea;
        }

        .profile-img {
            border-radius: 50%;
            overflow: hidden;
            width: 250px;
            height: 250px;
            margin: 0 auto 30px;
            border: rgb(3, 163, 110) 4px solid;
        }

        .checked {
            color: #03a36e;
        }

        .section-wrapper:last-child {
            border-bottom: unset;
        }

        .helper-detail p {
            margin: 0;
        }

        .progress-item .progress-title {
            font-size     : 15px;
            font-weight   : 400;
            display       : inline-block;
            margin-bottom : 5px;
            }

        .progress-item .progress-bar {
            background-color: #00b0f0;
            text-align       : right;
            border-radius: .25rem;
            }

        .progress-item .progress-percent {
            font-size        : 10px;
            padding          : 0 8px;
            }

        .detailed-footer {
            padding: 20px;
            border-bottom: 1px solid #eaeaea;
        }

        .blog-card {
            box-shadow: 0 3px 7px -1px rgba(0, 0, 0, .1);
            margin-bottom: 20px;
        }

        .blog-card .description {
            padding: 1rem;
            background: #fff;
            position: relative;
            /* z-index: 1; */
        }
        .content-item ul {
            padding: 0 20px;
        }

        .content-item ul li {
            list-style: disc;
        }
        .add-review textarea {
            width: 100%;
            border: 1px solid #eaeaea;
            resize: none;
            border-radius: 5px;
            height: 100px;
            padding: 1rem;
        }
        .left-col-block .content h1 {
            font-weight: 500;
            margin: 0;
            padding: 0;
        }

        .left-col-block .lead {
            font-size: 18px;
            line-height: 30px;
            color: #03a36e;
            margin: 0;
            padding: 0;
            font-weight: 400;
        }
        .custom-dropdown {
            position: absolute;
            top: 0;
            right: 0;
        }

        .custom-dropdown .dropdown-toggle::after {
            content: unset;
        }

        .custom-dropdown .btn:focus {
            box-shadow: unset;
        }
        .custom-dropdown .dropdown-menu.show {
            transform: translate3d(-130px, 38px, 0px) !important;
        }
        .date-time {
            /* position: absolute; */
            bottom: 0;
            right: 0.5rem;
        }
        .total-jobs h1 {
            font-size: 50px;
            padding: 0;
            font-weight: 700;
        }

        .total-jobs {
            border: 1px solid #eaeaea;
            padding: 0px 0 10px;
        }
        .star-widget input {
            display: none;
        }
        .star-widget label {
            color: #444;
            padding: 2px;
            float: right;
            transition: all 0.2s ease;
        }
        
        input:not(:checked) ~ label:hover,
        input:not(:checked) ~ label:hover ~ label {
            color: #03a36e;
        }

        input:checked ~ label {
            color: #03a36e;
        }

        input#rate-5:checked ~ label {
            color: #03a36e;
        }
        .review-div {
            /* min-height: 100vh; */
            max-height: 100vh;
            overflow-y: scroll;
        }
        .review-div::-webkit-scrollbar {
            display: none;
        }
        .review-div {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        

    </style>
@endsection

@section('head_script')

@endsection

@section('content')

    <section>
        <div class="container p-0 my-5">
            <div class="col-12 p-0">
                @include('notifications')
                <div class="row">
                    <div class="col-md-3 py-1 overflow-hidden">
                        <div class="profile-img img-sm">
                            <img src="{{ asset('assets/uploads/profilesImage') .'/'.$user->userDetails->picture }}" class="img-responsive" alt="">
                        </div>
                        <div class="content">
                            <h5 class="badge badge-success">{{ $user->roles[0]->name }}</h5>
                            <h2 class="p-0">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</h2>
                            <div class="about-text">
                                <p>{{ $user->userDetails->bio ? $user->userDetails->bio : 'Bio' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-9 py-1 overflow-hidden">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h2>Contact</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Address</strong><br>
                                        {!! $user->userDetails->address !!}
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <strong>Post Code</strong><br>
                                        {{ $user->userDetails->postal }}
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <strong>Email</strong><br>
                                        <a href="mailto:#">{{ $user->email }}</a>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <strong>Mobile Number</strong><br>
                                        {{ $user->userDetails->country_code }} {{ $user->userDetails->phone }}
                                    </address>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h2 class="p-0">Reviews</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 review-div">
                                    @if(isset($user->reviews))
                                        @foreach($user->reviews as $review)
                                            <div class="card my-2">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="header-user-img mr-3">
                                                            <img src="{{ asset('assets/uploads/profilesImage') .'/'.$review->homeowner_id->userDetails->picture }}">
                                                        </div>
                                                        <h3 class="d-flex flex-row align-items-center p-0">{{ $review->homeowner_id->first_name }} {{ $review->homeowner_id->last_name }}</h3>

                                                        <div class="d-flex flex-row align-items-center ml-auto">
                                                            @for($i=0; $i<$review->point; $i++)
                                                                <span class="fa fa-star checked"></span>
                                                            @endfor
                                                            @for($i=0; $i<5 - $review->point; $i++)
                                                                <span class="fa fa-star"></span>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <p>{{ $review->comment }}</p>
                                                    <strong><span class="date-time">{{ $review->created_at->format('d F, y') }}</span></strong>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif                                  
                                </div>
                                {{-- @if() --}}
                                <div class="col-md-12 review-box">
                                    <hr class="my-2">
                                    <form action="{{ route('post-review', ['id' => Sentinel::getUser()->id, 'tradesperson' => $user->id, 'job_id' => Request::input('job') ] ) }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="obj" value="{{Request::input('job')}}">
                                        <div class="content-item">
                                            <div class="add-review">
                                                <textarea class="form-control" rows="10" name="review" id="review" placeholder="add a review"></textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <div class="star-widget align-items-center">
                                                <input type="radio" name="rate" value="5" id="rate-1">
                                                <label for="rate-1" class="fa fa-star"></label>
                                                <input type="radio" name="rate" value="4" id="rate-2">
                                                <label for="rate-2" class="fa fa-star"></label>
                                                <input type="radio" name="rate" value="3" id="rate-3">
                                                <label for="rate-3" class="fa fa-star"></label>
                                                <input type="radio" name="rate" value="2" id="rate-4">
                                                <label for="rate-4" class="fa fa-star"></label>
                                                <input type="radio" name="rate" value="1" id="rate-5">
                                                <label for="rate-5" class="fa fa-star"></label>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success">Post my review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                 {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
@endsection

@section('footer_script')
    
    

@endsection