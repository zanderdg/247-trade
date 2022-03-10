{{-- * Template Name : Home * --}}
@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Welcome
@parent
@stop

@section('head_style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <div style="clear: both;"></div>
    <div  id="CreateAJob" class="banner_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="best_taital">DISCOVER LOCAL TRADESPEOPLE IN YOUR AREA FOR YOUR JOB.</h1>
                    <p class="there_text"> IT'S FREE TO POST YOUR JOB. MATCH TO TRADESPEOPLE AND WAIT TO BE CONTACTED FOR QUOTES IT'S AS EASY AS PUTTING THE KETTLE ON</p>
                    <div class="box_main">
                        <form action="{{ route('postJob') }}" method="get">
                            <input type="text" class="email_bt" placeholder="{{ Session::get('message') !== null ? Session::get('message') : 'What Service are you looking for?' }}" name="categoryName" id="searchCat">
                            <button type="submit" class="subscribe_bt">Next Step <span> ></span></button>
                            <div id="searchResult"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('template.parts.categories')

	<section class="thired-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mt-5">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <ul class="pointsAtHome  mt-5">
                            <li>Post a job free</li>
                            <li>Get a <span>Quote</span></li>
                            <li>Review <span>TRADESPEOPLE</span></li>
                        </ul>
                    </div>
                </div>
            </div>
		</div>
    </section>

    <div style="clear: both;"></div>
    <section class="section-four">
        <div class="mm-pp">
            <p>RECENT</p>
            <h3>JOB POSTS</h3>
        </div>
        <div class="container">
		    <div class="row">
                <div class="owl-carousel owl-theme custom-carousel">
                    @foreach($ramdomJob as $job)
                    <div class="item">
                        <!--<a href="{{ route('livelead-preview', $job->id) }}">-->
                            <div class="form-group">
                                <fieldset class="the-fieldset">
                                    <div class="row">
                                        <div class="col-3">
                                            <img style="border-radius: 50%;" src="{{ asset('assets/uploads/profilesImage').'/'.$job->picture }}">
                                        </div>
                                        <div class="col-9 pt-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3>{{ $job->title }} </h3>
                                                </div>
                                                <div class="col-12">
                                                    {{-- <span>Designation</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{ $job->description }}</p>
                                </fieldset>
                            </div>
                        <!--</a>-->
                    </div>
                    @endforeach
                </div>
		    </div>
	    </div>
    </section>

    <section class="section-five">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <figure class="figure mb-5">
                        <iframe class="shadow rounded p-3" width="100%" height="315" src="https://www.youtube.com/embed/mk7kFvPwviE?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <iframe  class="shadow rounded p-3" width="100%" height="315" src="https://www.youtube.com/embed/AqFOjKGWokY?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </figure>
                </div>
                <div class="col-sm-6 my-auto">
                    <div class="home-carousel-two owl-theme owl-carousel">
                        @if(isset($testimonials))
                            @foreach($testimonials as $testimonial)
                                <div class="card mx-2">
                                    <div class="card-body">
                                        {{-- <legend class="the-legend"><img src="{{ asset('assets/front_lib/images/testi-img.png') }}"></legend> --}}
                                        <h3 class="card-title p-0">{{$testimonial->title }}</h3>
                                        <small class="mt-0">{{ $testimonial->designation }}</small> 
                                        <p class="card-text m-0"> {!! $testimonial->content !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

   @include('template.parts.trade&service')

@endsection

@section('footer_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        
        // $(document).ready(function() {
        //     $('.searchable-dropdown').select2();
        // });
        $(document).ready(function(){
            $('#searchCat').keyup(function(){ 
                var query = $(this).val();                
                
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('s.services') }}",
                        method:"POST",
                        data:{query:query, _token:_token},
                        success:function(data){
                            if(data){
                                $('#searchResult').fadeIn();  
                                $('#searchResult').html(data);
                            } else {
                                $('#searchResult').hide();
                            }
                        }
                    });
                }
            });
            $(document).on('click', 'li', function(){  
                $('#searchCat').val($(this).text());  
                $('#searchResult').fadeOut();  
            });
        });

    </script>
@endsection
