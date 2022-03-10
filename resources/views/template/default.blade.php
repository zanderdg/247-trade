{{-- * Template Name : Default * --}}

@extends('layouts.site.app')

@section('title')
    {!! isset($pageContent->meta_title) ? $pageContent->meta_title : '24/Seven' !!}
@stop

@section('meta-keywords')
    {!! isset($pageContent->meta_keywords) ? $pageContent->meta_keywords : '24/Seven' !!}
@stop

@section('meta-description')
    {!! isset($pageContent->meta_description) ? $pageContent->meta_description : '24/Seven' !!}
@stop

@section('content')

	<!-- PhotoSlider Section -->
	<div class="container-fluid no-padding pagebanner"  @if($pageContent->image) style="background:rgba(0, 0, 0, 0) url('uploads/source/{!! $pageContent->image !!}') no-repeat scroll center center / cover !important; " @endif >
		<div class="container">
			<div class="pagebanner-content">
				<h3>{!! $pageContent->title !!}</h3>
                <h4>{!! $pageContent->short_title !!}</h4>
				<ol class="breadcrumb">
					<li><a href="{!! URL::to('/') !!}">Home</a></li>
                    <li>{!! $pageContent->title !!}</li>
				</ol>
			</div>
		</div>
	</div><!-- PhotoSlider Section /- -->	

	<!-- Welcome Section -->

       <!-- <div class="section-padding2"></div> -->


	 <div class="container welcome-section">
		<div class="section-padding"></div>
		<div class="section-header">
		{!! $pageContent->content !!}
		</div>
	</div>

@endsection