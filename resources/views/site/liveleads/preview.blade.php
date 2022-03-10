@extends('layouts.site.app')
@section('title')
Preview leads
@parent
@stop
@section('head_style')
    <style>
        .map_div {
            height: 20rem;
        }
        #map {
            height: 100%!important;
        }
        .h-f-content {
            height: fit-content;
        }
    </style>
@endsection
@section('content')
    <div class="container overflow-hidden">
        <a href="{{ route('liveleads') }}" class="text-success">
            <p><i class="mr-2 fa fa-arrow-left"></i><strong>Back to leads</strong></p>
        </a>
        <div class="row">
            <div class="col-12 mx-3">
                <h3 class="p-0">{{ $job->title }}</h3>
                <small class="mr-2">{{ $job->category_name }}</small>|<small class="ml-2">{{$job->sub_category_id}}</small>
            </div>
            <div class="col-12 info-bar">
                <div class="mx-3 d-flex justify-content-between">
                    <small class="text-uppercase">REF:<strong class="ml-2">{{ $job->reference_number }}</strong></small>
                    <small class="text-uppercase"><strong>{{ $job->created_at->diffForHumans(null, true).' ago' }}</strong></small>
                </div>
                <hr class="my-1">
            </div>            
            <div class="col-12 mt-2 job-detail">
                <div class="post-div">
                    <div class="post-des col-md-9">
                        <p>{{ $job->description }}</p>
                    </div>
                    <div class="post-info col-md-3">
                        <p>Location: <strong class="ml-2">{{ $job->location }}, {{ $job->postcode }}</strong></p>
                    </div>
                </div>
                <hr class="my-3">
            </div>
            <div class="col-12 job-price">
                <div class="mx-3 d-flex justify-content-between">
                    <button class="btn btn-outline-danger btn-sm text-uppercase" id="notinter">Not Interested</button>
                    @if(Sentinel::check() && Sentinel::getUser()->roles[0]->slug =='tradeperson')
                        <?php $arr = []; ?>
                        @foreach($job->leadPurchaseBy as $leadsId)
                        <?php $arr[] = $leadsId->id; ?>
                        @endforeach
                        @if(!in_array(Sentinel::getUser()->id, $arr))
                            <div class="price-label d-flex d-flex-inline">
                                <span class="px-2 mt-1 text-uppercase"><strong>Buy Now</strong></span>
                                <a href="{{ route('checkout', $job->id) }}" class="btn btn-sm btn-outline-success text-uppercase">£5 + VAT</a>
                            </div>
                        @else
                            <div class="m-0 alert alert-info" role="alert">
                                You already purchase lead on this job — <a href="{{ route('client-dashboard') }}" class="alert-link text-uppercase">My Leads</a>
                            </div>
                        @endif
                    @else
                        <div class="m-0 alert alert-info" role="alert">
                            Need to Login and register! — <a href="{{ route('client-login') }}"><strong class="text-uppercase">Login</strong></a>
                        </div>
                    @endif
                </div>
                <hr class="my-3">
            </div>
            <div class="col-12 mt-2 job-detail">
                <div class="mx-3">
                    <h3><strong>Map</strong></h3>
                    <div class="map_div overflow-hidden rounded">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('Google_MAP_KEY') }}&geometry=&v=weekly&libraries=&v=weekly" defer ></script>
    <script>
        const UK_BOUNDS = {
            north: 61.061,
            south: 49.674,
            west: -14.015,
            east: 2.091,
        };
        $(document).ready(function() {
            let map;

            map = new google.maps.Map( document.getElementById("map"), {
                zoom: 12,
                center: { lat:{{ $job->lat }} , lng:{{ $job->lng }}},
                clickableIcons: false,
                scrollwheel: false,
                mapTypeId: "roadmap",
                mapTypeControl: false,
                zoomControl: false,
                streetViewControl: false,
                fullscreenControl: false,
                draggable: false,
                restriction: {
                    latLngBounds: UK_BOUNDS,
                    strictBounds: true,
                }                
            })
            new google.maps.Circle({
                strokeColor: "#03a36e",
                strokeOpacity: 1,
                strokeWeight: 3,
                fillColor: "#03a36e",
                fillOpacity: 0.05,
                map,
                center: { lat:{{ $job->lat }} , lng:{{ $job->lng }}},
                radius: 30 * 100,
            })
        })
        
        $('#notinter').on('click', function(event){
            event.preventDefault();
            $.post('/live-leads/remove-lead', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                job_id: '{{ $job->id }}'
            }).then(res => res.success ? window.location.replace(res.path) : null)
        })
    </script>
@endsection