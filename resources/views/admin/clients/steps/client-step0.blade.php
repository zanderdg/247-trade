@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Clients Filter Reports
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Clients</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Clients</li>
        <li class="active">Steps</li>
    </ol>
</section>
<section class="content paddingleft_right15">
      <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Steps
                </h4>
                <div class="pull-right">
                    <a href="{{ route('clients') }}" class="btn btn-sm btn-default"><span class="glyphicon"></span> Back</a>
                    </div>
            </div>
            <br />
            <div class="panel-body">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen"> -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> -->
<style type="text/css">
      select#sel1 {
          display: block !important;
      }
          
          .wizard-content-left {
        background-blend-mode: darken;
        background-color: rgba(0, 0, 0, 0.45);
        background-image: url("https://i.ibb.co/X292hJF/form-wizard-bg-2.jpg");
        background-position: center center;
        background-size: cover;
        height: 100vh;
        padding: 30px;
      }
      .wizard-content-left h1 {
        color: #ffffff;
        font-size: 38px;
        font-weight: 600;
        padding: 12px 20px;
        text-align: center;
      }

      .form-wizard {
        color: #888888;
        padding: 30px;
      }
      .form-wizard .wizard-form-radio {
        display: inline-block;
        margin-left: 5px;
        position: relative;
      }
      .form-wizard .wizard-form-radio input[type="radio"] {
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        background-color: #dddddd;
        height: 25px;
        width: 25px;
        display: inline-block;
        vertical-align: middle;
        border-radius: 50%;
        position: relative;
        cursor: pointer;
      }
      .form-wizard .wizard-form-radio input[type="radio"]:focus {
        outline: 0;
      }
      .form-wizard .wizard-form-radio input[type="radio"]:checked {
        background-color: #fb1647;
      }
      .form-wizard .wizard-form-radio input[type="radio"]:checked::before {
        content: "";
        position: absolute;
        width: 10px;
        height: 10px;
        display: inline-block;
        background-color: #ffffff;
        border-radius: 50%;
        left: 1px;
        right: 0;
        margin: 0 auto;
        top: 8px;
      }
      .form-wizard .wizard-form-radio input[type="radio"]:checked::after {
        content: "";
        display: inline-block;
        webkit-animation: click-radio-wave 0.65s;
        -moz-animation: click-radio-wave 0.65s;
        animation: click-radio-wave 0.65s;
        background: #000000;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
        border-radius: 50%;
      }
      .form-wizard .wizard-form-radio input[type="radio"] ~ label {
        padding-left: 10px;
        cursor: pointer;
      }
      .form-wizard .form-wizard-header {
        text-align: center;
      }
      .form-wizard .form-wizard-next-btn, .form-wizard .form-wizard-previous-btn, .form-wizard .form-wizard-submit {
        background-color: #d65470;
        color: #ffffff;
        display: inline-block;
        min-width: 100px;
        min-width: 120px;
        padding: 10px;
        text-align: center;
      }
      .form-wizard .form-wizard-next-btn:hover, .form-wizard .form-wizard-next-btn:focus, .form-wizard .form-wizard-previous-btn:hover, .form-wizard .form-wizard-previous-btn:focus, .form-wizard .form-wizard-submit:hover, .form-wizard .form-wizard-submit:focus {
        color: #ffffff;
        opacity: 0.6;
        text-decoration: none;
      }
      .form-wizard .wizard-fieldset {
        display: none;
      }
      .form-wizard .wizard-fieldset.show {
        display: block !important;
      }
      .form-wizard .wizard-form-error {
        display: none;
        background-color: #d70b0b;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 2px;
        width: 100%;
      }
      .form-wizard .form-wizard-previous-btn {
        background-color: #fb1647;
      }
      .form-wizard .form-control {
        font-weight: 300;
        height: auto !important;
        padding: 15px;
        color: #888888;
        background-color: #f1f1f1;
        border: none;
      }
      .form-wizard .form-control:focus {
        box-shadow: none;
      }
      .form-wizard .form-group {
        position: relative;
        margin: 25px 0;
      }
      .form-wizard .wizard-form-text-label {
        position: absolute;
        left: 10px;
        top: 16px;
        transition: 0.2s linear all;
      }
      .form-wizard .focus-input .wizard-form-text-label {
        color: #d65470;
        top: -18px;
        transition: 0.2s linear all;
        font-size: 12px;
      }
      .form-wizard .form-wizard-steps {
        margin: 30px 0;
      }
      .form-wizard .form-wizard-steps li {
        width: 25%;
        float: left;
        position: relative;
      }
      .form-wizard .form-wizard-steps li::after {
        background-color: #f3f3f3;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        border-bottom: 1px solid #dddddd;
        border-top: 1px solid #dddddd;
      }
      .form-wizard .form-wizard-steps li span {
        background-color: #dddddd;
        /*border-radius: 50%;*/
        display: inline-block;
        height: 40px;
        line-height: 40px;
        position: relative;
        text-align: center;
        width: 80%;
        z-index: 1;
      }
      .form-wizard .form-wizard-steps li:last-child::after {
        width: 50%;
      }
      .form-wizard .form-wizard-steps li.active span, .form-wizard .form-wizard-steps li.activated span {
        background-color: #d65470;
        color: #ffffff;
      }
      .form-wizard .form-wizard-steps li.active::after, .form-wizard .form-wizard-steps li.activated::after {
        background-color: #d65470;
        left: 50%;
        width: 50%;
        border-color: #d65470;
      }
      .form-wizard .form-wizard-steps li.activated::after {
        width: 100%;
        border-color: #d65470;
      }
      .form-wizard .form-wizard-steps li:last-child::after {
        left: 0;
      }
      .form-wizard .wizard-password-eye {
        position: absolute;
        right: 32px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
      }
      @keyframes click-radio-wave {
        0% {
          width: 25px;
          height: 25px;
          opacity: 0.35;
          position: relative;
        }
        100% {
          width: 60px;
          height: 60px;
          margin-left: -15px;
          margin-top: -15px;
          opacity: 0.0;
        }
      }
      @media screen and (max-width: 767px) {
        .wizard-content-left {
          height: auto;
        }
      }
</style>
<section class="wizard-section">
  <div class="container">
  <div class="row">
        
  </div>
</div>
        <div class="container">
         <!--    <div class="col-lg-6 col-md-6">
                <div class="wizard-content-left d-flex justify-content-center align-items-center">
                    <h1>Create Your Bank Account</h1>
                </div>
            </div> -->
            <!-- <div class="row">
                <div  class="dash-user pull-right col-md-12" style="text-align:center;">
                  <p class="username-dash">
                    Hello, {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                    <a href="{{ route('client-logout') }}">Logout</a>
                  </p>
                </div>
            </div> -->
            <div class="row">

              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-container" style="height:550px;margin-top: 100px;">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-menu" style="padding:20px;">
                    <div class="list-group">
                      <a href="javascript:void(0);step-0" class="list-group-item active text-center">
                       <i class="fa fa-road" aria-hidden="true"></i><br>SELECT INCOME/EXPENSE
                      </a>
                      <a href="javascript:void(0);step-1" class="list-group-item text-center">
                      <i class="fa fa-road" aria-hidden="true"></i><br>INCOME
                      </a>
                      <a href="javascript:void(0);step-2" class="list-group-item text-center">
                        <i class="fa fa-road" aria-hidden="true"></i><br>EXPENSE
                      </a>
                      <a href="javascript:void(0);step-3" class="list-group-item text-center">
                      <i class="fa fa-road" aria-hidden="true"></i><br>PERIOD
                      </a>
                      <a href="javascript:void(0);step-4" class="list-group-item text-center">
                        <i class="fa fa-road" aria-hidden="true"></i><br>FEES
                      </a>
                      <a href="javascript:void(0);step-5" class="list-group-item text-center">
                        <i class="fa fa-road" aria-hidden="true"></i><br>REPORT
                      </a>
                    </div>
                  </div>
              </div>
              <div class="col-lg-8 col-md-8 offset-md-0">
                  <div class="form-wizard">
                      <h1>Subscription: {{$substype_name}}</h1>
                      <form action="step-1" method="post" role="form" id="st0">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <fieldset class="wizard-fieldset show">
                              <h5>Select Income</h5>
                              <label for="">Choose Options:</label>
                              <table class="table table-bordered table-order" id="table1">                       
                                  <tbody>                                            
                                      {{--*/ $s = 0; $m = 50; /*--}}
                                      @foreach($all_incomes as $br)
                                      @if($s %2==0)
                                      <tr role="row" class="odd">
                                      @endif    
                                          <td class="sorting_1">
                                              <div class="checkbox">
                                                <label><input class="required" name="sel_incomes[]" @if(null !== (request()->session()->get('sel_incomes')) && in_array($br->income_name.'_'.$br->income_multi_fields.'_'.$br->income_percent.'_'.$br->income_manual, request()->session()->get('sel_incomes'))) checked @endif type="checkbox" value="{{$br->income_name}}_{{$br->income_multi_fields}}_{{$br->income_percent}}_{{$br->income_manual}}"> {{$br->income_name}}</label>
                                                <!-- <label><input class="required" name="income_multi_fields[]" type="text" value="{{$br->income_multi_fields}}"></label> -->
                                              </div>
                                          </td>
                                          @if($s > 2 && $s %2==0)
                                      <!-- </tr> -->
                                      @endif 
                                      {{--*/ $s++; $m++; /*--}}   
                                      @endforeach
                                  </tbody>
                              </table>

                              <h5>Select Expenses</h5>
                              <label for=""><strong>Non Capital Expenses:</strong></label>
                              <table class="table table-bordered table-order" id="table1">                       
                                  <tbody>                                            
                                      {{--*/ $s = 0; $m = 50; /*--}}
                                      @foreach($all_expenses1 as $ae)
                                      @if($s %2==0)
                                      <tr role="row" class="odd">
                                      @endif    
                                          <td class="sorting_1">
                                              <div class="checkbox">
                                                <label><input class="required" name="sel_expenses[]" @if(null !== (request()->session()->get('sel_expenses')) && in_array($ae->expense_name.'_'.$ae->expense_percent.'_'.$ae->expense_manual.'_'.$ae->ec_id, request()->session()->get('sel_expenses'))) checked @endif type="checkbox" value="{{$ae->expense_name}}_{{$ae->expense_percent}}_{{$ae->expense_manual}}_{{$ae->ec_id}}"> {{$ae->expense_name}}</label>
                                              </div>
                                          </td>
                                          @if($s > 2 && $s %2==0)
                                      <!-- </tr> -->
                                      @endif 
                                      {{--*/ $s++; $m++; /*--}}   
                                      @endforeach
                                  </tbody>
                              </table>
                              <label for=""><strong>Capital Expenses:</strong></label>
                              <table class="table table-bordered table-order" id="table1">                       
                                  <tbody>                                            
                                      {{--*/ $s = 0; $m = 50; /*--}}
                                      @foreach($all_expenses2 as $ae)
                                      @if($s %2==0)
                                      <tr role="row" class="odd">
                                      @endif    
                                          <td class="sorting_1">
                                              <div class="checkbox">
                                                <label><input class="required" name="sel_expenses[]" @if(null !== (request()->session()->get('sel_expenses')) && in_array($ae->expense_name.'_'.$ae->expense_percent.'_'.$ae->expense_manual.'_'.$ae->ec_id, request()->session()->get('sel_expenses'))) checked @endif type="checkbox" value="{{$ae->expense_name}}_{{$ae->expense_percent}}_{{$ae->expense_manual}}_{{$ae->ec_id}}"> {{$ae->expense_name}}</label>
                                              </div>
                                          </td>
                                          @if($s > 2 && $s %2==0)
                                      <!-- </tr> -->
                                      @endif 
                                      {{--*/ $s++; $m++; /*--}}   
                                      @endforeach
                                  </tbody>
                              </table>
                              <label for=""><strong>Non GST Items:</strong></label>
                              <table class="table table-bordered table-order" id="table1">                       
                                  <tbody>                                            
                                      {{--*/ $s = 0; $m = 50; /*--}}
                                      @foreach($all_expenses3 as $ae)
                                      @if($s %2==0)
                                      <tr role="row" class="odd">
                                      @endif    
                                          <td class="sorting_1">
                                              <div class="checkbox">
                                                <label><input class="required" name="sel_expenses[]" @if(null !== (request()->session()->get('sel_expenses')) && in_array($ae->expense_name.'_'.$ae->expense_percent.'_'.$ae->expense_manual.'_'.$ae->ec_id, request()->session()->get('sel_expenses'))) checked @endif type="checkbox" value="{{$ae->expense_name}}_{{$ae->expense_percent}}_{{$ae->expense_manual}}_{{$ae->ec_id}}"> {{$ae->expense_name}}</label>
                                              </div>
                                          </td>
                                          @if($s > 2 && $s %2==0)
                                      <!-- </tr> -->
                                      @endif 
                                      {{--*/ $s++; $m++; /*--}}   
                                      @endforeach
                                  </tbody>
                              </table>
                              
                              <h5>Select Period</h5>
                              <label for="sel1">Select Period:</label>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 offset-md-0">
                                  <select class="form-control required" id="sel1" name="q_period"  style="display: block !important;">
                                    <option value="7" @if(null !== (request()->session()->get('q_period')) && request()->session()->get('q_period') == 7) selected @endif>July - Sept</option>
                                    <option value="10" @if(null !== (request()->session()->get('q_period')) && request()->session()->get('q_period') == 10) selected @endif>Oct - Dec</option>
                                    <option value="1" @if(null !== (request()->session()->get('q_period')) && request()->session()->get('q_period') == 1) selected @endif>Jan - Mar</option>
                                    <option value="4" @if(null !== (request()->session()->get('q_period')) && request()->session()->get('q_period') == 4) selected @endif>Apr - Jun</option>
                                  </select>
                                  
                                </div>
                                <div class="col-lg-6 col-md-6 offset-md-0">
                                  <?php
                                  $Startyear=date('Y');
                                  $endYear=$Startyear+5;
                                  $yearArray = range($Startyear,$endYear);
                                  ?>
                                  <select class="form-control required" id="sel1" name="q_period_year"  style="display: block !important;">
                                    <?php
                                    foreach ($yearArray as $year) {
                                        // $selected = ($year == $Startyear) ? 'selected' : '';
                                        if(null !== (request()->session()->get('q_period_year')) && request()->session()->get('q_period_year') == $year){
                                          $selected = "selected";
                                        }else{
                                          $selected = "";
                                        }
                                        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                    }
                                    ?>
                                  </select>
                                  
                                </div>
                              </div>




                              
                              <div class="form-group clearfix">
                                  <a href="javascript:void(0);" onclick="$('#st0').submit();" class="form-wizard-next-btn float-right">Next</a>
                              </div>
                          </fieldset> 
                    
                      </form>
                  </div>
              </div>

              <div class="col-lg-1 col-md-1 offset-md-0">
              </div>
            </div>


        </div>
    </section> 
<!-- form wizard end -->
<script src="{{ URL::to('/') }}/js/jquery.min.js"></script> 
<script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
             jQuery(document).ready(function() {
    // click on next button
    // jQuery('.form-wizard-next-btn').click(function(e) {
    //       e.preventDefault();

    //     var parentFieldset = jQuery(this).parents('.wizard-fieldset');
    //     // var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
    //     var next = jQuery(this);
    //     var nextWizardStep = false;
    //     parentFieldset.find('.required').each(function(){
    //         var thisValue = jQuery(this).val();
    //         // alert('asa');
    //         if( thisValue == "") {
            
    //             jQuery(this).siblings(".wizard-form-error").slideDown();
    //             nextWizardStep = false;
    //         }
    //         else {
    //         nextWizardStep=true;
    //             jQuery(this).siblings(".wizard-form-error").slideUp();
    //         }
    //     });
    //     if(nextWizardStep === true){
    //       location.href=$(this).attr('href');
    //     }
    // });
    //click on previous button
    // jQuery('.form-wizard-previous-btn').click(function() {
    //     var counter = parseInt(jQuery(".wizard-counter").text());;
    //     var prev =jQuery(this);
    //     var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
    //     prev.parents('.wizard-fieldset').removeClass("show","400");
    //     prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
    //     currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
    //     jQuery(document).find('.wizard-fieldset').each(function(){
    //         if(jQuery(this).hasClass('show')){
    //             var formAtrr = jQuery(this).attr('data-tab-content');
    //             jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
    //                 if(jQuery(this).attr('data-attr') == formAtrr){
    //                     jQuery(this).addClass('active');
    //                     var innerWidth = jQuery(this).innerWidth();
    //                     var position = jQuery(this).position();
    //                     jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
    //                 }else{
    //                     jQuery(this).removeClass('active');
    //                 }
    //             });
    //         }
    //     });
    // });
    //click on form submit button
    // jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
    //     var parentFieldset = jQuery(this).parents('.wizard-fieldset');
    //     var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
    //     parentFieldset.find('.wizard-required').each(function() {
    //         var thisValue = jQuery(this).val();
    //         if( thisValue == "" ) {
    //             jQuery(this).siblings(".wizard-form-error").slideDown();
    //         }
    //         else {
    //             jQuery(this).siblings(".wizard-form-error").slideUp();
    //         }
    //     });
    // });
    // focus on input field check empty or not
    // jQuery(".form-control").on('focus', function(){
    //     var tmpThis = jQuery(this).val();
    //     if(tmpThis == '' ) {
    //         jQuery(this).parent().addClass("focus-input");
    //     }
    //     else if(tmpThis !='' ){
    //         jQuery(this).parent().addClass("focus-input");
    //     }
    // }).on('blur', function(){
    //     var tmpThis = jQuery(this).val();
    //     if(tmpThis == '' ) {
    //         jQuery(this).parent().removeClass("focus-input");
    //         jQuery(this).siblings('.wizard-form-error').slideDown("3000");
    //     }
    //     else if(tmpThis !='' ){
    //         jQuery(this).parent().addClass("focus-input");
    //         jQuery(this).siblings('.wizard-form-error').slideUp("3000");
    //     }
    // });
});

         </script>
@endsection