@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Profile
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
        font-size: 15px;
        font-weight: 400;
        display: inline-block;
        margin-bottom: 5px;
    }

    .progress-item .progress-bar {
        background-color: #00b0f0;
        text-align: right;
        border-radius: .25rem;
    }

    .progress-item .progress-percent {
        font-size: 10px;
        padding: 0 8px;
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
</style>
@endsection

@section('content')

<section>
    <div class="container my-5">
        @include('notifications')
        <div class="row">
            <div class="col-lg-3 py-1 overflow-hidden">
                <div class="profile-img img-sm">
                    <img src="{{ asset('assets/uploads/profilesImage') .'/'.Sentinel::getUser()->userDetails->picture }}" class="img-responsive">
                </div>
                <div class="content">
                    <h5 class="badge badge-success">{{ $user->roles[0]->name }}</h5>
                    <h2 class="p-0">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</h2>
                    <div class="about-text">
                        <p>{{ $user->userDetails->bio ? $user->userDetails->bio : 'Bio' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 py-1 overflow-hidden">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 text-right ">
                            <a href="{{ route('client-dashboard') }}" class="btn btn-outline-success">{{ Sentinel::getUser()->roles[0]->slug == 'tradeperson' ? 'My leads' : 'My jobs' }}</a>
                            <a href="{{ route('update-profile', $user->id) }}" class="btn btn-outline-success">Profile</a>
                            {{-- @if(Sentinel::getUser()->roles[0]->slug == 'tradeperson' ) --}}
                            <a href="{{ route('account_setting') }}" class="btn btn-outline-success">Setting</a>
                            {{-- @endif --}}
                        </div>
                    </div>
                    @if(Sentinel::getUser()->roles[0]->slug == 'tradeperson')
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="section-title">
                                <h2 class="p-0">Expertise</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-item">
                                @if(isset($user->services))
                                <ul class="ml-2">
                                    @foreach($user->services as $key => $service)
                                    <li>{{ $service }}</li>
                                    @endforeach
                                </ul class="ml-2">
                                @else
                                <p> Not available. </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr class="my-2">
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
                    @if(Sentinel::getUser()->roles[0]->slug == 'tradeperson')
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>Reviews</h2>
                            </div>
                        </div>
                    </div>
                    @if(isset($user->reviews))
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($user->reviews as $review)
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="header-user-img mr-3">
                                            <img src="{{ asset('assets/uploads/profilesImage') .'/'. $review->homeowner_id->userDetails->picture }}">
                                        </div>
                                        <h3 class="d-flex flex-row align-items-center p-0">{{$review->homeowner_id->first_name}} {{$review->homeowner_id->last_name}}</h3>

                                        <div class="d-flex flex-row align-items-center ml-auto">
                                            @for($i=0; $i<$review->point; $i++)
                                                <span class="fa fa-star checked"></span>
                                                @endfor
                                                @for($i=0; $i<5 - $review->point; $i++)
                                                    <span class="fa fa-star"></span>
                                                    @endfor
                                        </div>
                                    </div>
                                    <p> {{ $review->comment }} </p>
                                    <strong><span class="date-time">{{$review->created_at->format('d F, y') }}</span></strong>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-12">
                            <p>No Reviews Found</p>
                        </div>
                    </div>
                    @endif
                    @endif
                    @if(Sentinel::getUser()->roles[0]->slug == 'homeowner')
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <a href="{{ route('client-dashboard') }}">
                                <div class="total-jobs">
                                    <h1>{{ count($user->jobs) }}</h1>
                                    <strong>Total Jobs</strong>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('footer_script')
@endsection