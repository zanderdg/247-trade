@extends('layouts.site.app')
@section('head_style')
<link rel="stylesheet" href="{{ asset('assets/front_lib/css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/front_lib/css/spinner.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.3.0/nouislider.min.css">
@endsection
@section('title')
Liveleads
@parent
@stop
@section('content')
<section class="liveleads">
    <div class="container">
        <div class="banner-content hav-aa">
            <h3>LIVE LEADS!</h3>
            <a href="#">Get A Quote</a>
        </div>
    </div>
</section>
<br>
<div class="section-new">
    <div class="container">
        @include('notifications')
        <div class="row">
            <div class="col-md-12">
                <section class="services-mm lead-aa">
                    <div class="container">
                        <div class="row">
                            <h3 class="bbjj">Search Jobs</h3>
                            <div class="main-ss">
                                <div class="row mb-3">
                                    <div class="col-lg-4 mb-2">
                                        <div class="custom-search">
                                            <i class="fa fa-search h4 text-body"></i>
                                            <input class="form-control form-control-lg form-control-borderless" name="keyword" type="search" placeholder="Search topics or keywords" id="searchquery">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 mb-2">
                                        <div class="custom-dropdown">
                                            <img src="{{ asset('assets/front_lib/images/icon-select.png') }}">
                                            <select name="catrgory" id="catrgory">
                                                <option selected disabled value="">Select Service</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 mb-2">
                                        <div class="custom-button">
                                            <a href="#" id="seacrh"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="text-bb">
                    <div class="container">
                        <div class="row" id="data"></div>
                        <div class="spinnerContainer">
                            <div class="sk-chase" id="spinner">
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('Google_MAP_KEY') }}&geometry=&v=weekly&libraries=&v=weekly" defer></script>
<script src="{{ asset('assets/front_lib/js/workarea.js') }}"></script>
<script src="{{ asset('assets/front_lib/js/custom.js') }}"></script>
<script>
    function notinter(event, id) {
        event.preventDefault();
        $.post('/live-leads/remove-lead', {
            _token: $('meta[name="csrf-token"]').attr('content'),
            job_id: id
        }).then(res => res.success ? window.location.replace(res.path) : null)
    }
</script>
@endsection