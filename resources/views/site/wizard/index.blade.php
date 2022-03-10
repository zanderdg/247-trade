@extends('layouts.site.app')

@section('head_style')
    <link rel="stylesheet" href="{{ asset('assets/front_lib/css/prettify.css') }}">
    <style>
      .field.image-upload {
        position: relative;
      }
      .image-upload > input {
          opacity: 0;
          position: absolute;
          left: 0;
          width: 85px;
          height: 75px;
          cursor: pointer;
      }

      .image-upload i
      {
          font-size: 80px;
          cursor: pointer;
          color: #02b86b;
      }
      .imageThumb {
          width: 80px;
          height: 80px;
          border: 2px solid;
          padding: 1px;
          cursor: pointer;
          margin: 0 auto;
      }
      .pip {
          display: inline-block;
          margin: 10px 10px 0 0;
          position: relative;
      }
      .remove {
          background: #444;
          border: 1px solid black;
          color: white;
          cursor: pointer;
          position: absolute;
          top: 5px;
          right: 5px;
          padding: 0px 8px;
          border-radius: 25px;
          width: 25px;
          height: 25px;
      }
      .remove:hover {
        background: white;
        color: black;
      }
    </style>
@endsection

{{-- Page title --}}
@section('title')
Post Job 
@parent 
@stop

@section('content')
    
  <div class="container min_height">
    <form id="rootwizardForm" role="application" class="clearfix" novalidate="novalidate">
        <div class="my-5">
          <div class="">
            <p class="lead" for="sel1">What type of job is it?</p>
            <select class="form-control" style="1box-shadow: inset 0px 0px 4px #8f9193; outline:none; box-shadow: none;" id="sel1" name="subcategory">
              <option selected disabled>Select Category</option>
              @foreach ($sub_categories as $sub_category)
                <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
              @endforeach
            </select>
          </div>
          <div id="data">

            <section class="text-ser-tt my-5">
              <div class="container py-5">
                <div class="row">
                  <div class="col-md-12">
                    <!--<h3>What type of job is it? </h3>-->
                    <!--<p>Post a job today to find a rated tradesperson in your area.</p>-->
                  </div>
                </div>
              </div>
            </section>

          </div>
        </div> 
      </form>
  </div>

@endsection

@section('footer_script')
  <script src="{{ asset('assets/front_lib/js/jquery.bootstrap.wizard.js')}}"></script>
  <script src="{{ asset('assets/front_lib/js/prettify.js')}}"></script>
  <script src="{{ asset('assets/front_lib/js/jquery-validation.js')}}" ></script>
  <script src="{{ asset('assets/front_lib/js/additional-methods.js')}}" ></script>
  <script src="{{ asset('assets/front_lib/js/wizard_request.js')}}"></script>
@endsection