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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> -->
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
        border: 1px solid #ced4da !important;
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
                      <a href="javascript:void(0);{{ URL::to('/') }}/step-0" class="list-group-item  text-center">
                       <i class="fa fa-road" aria-hidden="true"></i><br>SELECT INCOME/EXPENSE
                      </a>
                      <a href="javascript:void(0);{{ URL::to('/') }}/step-1" class="list-group-item text-center">
                      <i class="fa fa-road" aria-hidden="true"></i><br>INCOME
                      </a>
                      <a href="javascript:void(0);{{ URL::to('/') }}/step-2" class="list-group-item text-center">
                        <i class="fa fa-road" aria-hidden="true"></i><br>EXPENSE
                      </a>
                      <a href="javascript:void(0);{{ URL::to('/') }}/step-3" class="list-group-item text-center">
                      <i class="fa fa-road" aria-hidden="true"></i><br>PERIOD
                      </a>
                      <a href="javascript:void(0);{{ URL::to('/') }}/step-4" class="list-group-item text-center">
                        <i class="fa fa-road" aria-hidden="true"></i><br>FEES
                      </a>
                      <a href="javascript:void(0);step-5" class="list-group-item active text-center">
                        <i class="fa fa-road" aria-hidden="true"></i><br>REPORT
                      </a>
                    </div>
                  </div>
              </div>
              <div class="col-lg-8 col-md-8 offset-md-0">
                  <div class="form-wizard">
                      <h1>Subscription: {{$substype_name}}</h1>
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-dismissable margin5">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Success:</strong> {{ $message }}
                      </div>
                      @endif
                      <form action="step-5" method="post" role="form" id="st1">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <fieldset class="wizard-fieldset show">
                            @if($substype == 3)

                              <h5>Your DIY BAS is here</h5>
                              
                              <h5>G1 (Total Income)</h5>
                              <div class="form-group">
                                  @if(request()->session()->get('single_income_total') != '' && request()->session()->get('single_income_total') != '0')
                                      <?php $g_income_total = request()->session()->get('single_income_total'); 
                                            $g_income_total = number_format((float)request()->session()->get('single_income_total'), 2, '.', '');
                                      ?>
                                  @elseif(request()->session()->get('multiple_income_total') != '' && (request()->session()->get('multiple_income_total') != '0'))
                                      <?php $g_income_total = request()->session()->get('multiple_income_total'); 
                                            $g_income_total = number_format((float)request()->session()->get('multiple_income_total'), 2, '.', '');
                                      ?>
                                  @else
                                      <?php $g_income_total = number_format((float)0, 2, '.', ''); ?>
                                  @endif
                                  <input type="text" value="{{$g_income_total}}" class="form-control wizard-required" readonly id="g_income_total" name="g_income_total">
                              </div>
                              <h5>1A (GST on Income)</h5>
                              <div class="form-group">
                                  @if(request()->session()->get('single_income_gst_collected') != '' &&(request()->session()->get('single_income_gst_collected') != '0'))
                                      <?php $a_income_gst_collected = request()->session()->get('single_income_gst_collected'); 
                                            $a_income_gst_collected = number_format((float)request()->session()->get('single_income_gst_collected'), 2, '.', '');
                                      ?>
                                  @elseif(request()->session()->get('multiple_income_gst_collected') != '' && (request()->session()->get('multiple_income_gst_collected') != '0'))
                                      <?php $a_income_gst_collected = request()->session()->get('multiple_income_gst_collected'); 
                                            $a_income_gst_collected = number_format((float)request()->session()->get('multiple_income_gst_collected'), 2, '.', '');
                                      ?>
                                  @else
                                      <?php $a_income_gst_collected = number_format((float)0, 2, '.', ''); ?>
                                  @endif
                                  <input type="text" value="{{$a_income_gst_collected}}" class="form-control wizard-required" readonly id="a_income_gst_collected" name="a_income_gst_collected">
                              </div>
                              <h5>G11 (Total Expenses)</h5>
                              <div class="form-group">
                                  @if(request()->session()->get('single_expense_total') != '' && (request()->session()->get('single_expense_total') != '0'))
                                      <?php $g_expense_total = request()->session()->get('single_expense_total'); 
                                            $g_expense_total = number_format((float)request()->session()->get('single_expense_total'), 2, '.', '');
                                      ?>
                                  @elseif(request()->session()->get('multiple_expense_total') != '' && (request()->session()->get('multiple_expense_total') != '0'))
                                      <?php $g_expense_total = request()->session()->get('multiple_expense_total'); 
                                            $g_expense_total = number_format((float)request()->session()->get('multiple_expense_total'), 2, '.', '');
                                      ?>
                                  @else
                                      <?php $g_expense_total = number_format((float)0, 2, '.', ''); ?>
                                  @endif
                                  <input type="text" value="{{$g_expense_total}}" class="form-control wizard-required" readonly id="g_expense_total" name="g_expense_total">
                              </div>
                              <h5>1B (GST on Expenses)</h5>
                              <div class="form-group">
                                  @if(request()->session()->get('single_expense_gst_paid') != '' && (request()->session()->get('single_expense_gst_paid') != '0'))
                                      <?php $b_expense_gst_paid = request()->session()->get('single_expense_gst_paid'); 
                                            $b_expense_gst_paid = number_format((float)request()->session()->get('single_expense_gst_paid'), 2, '.', '');
                                      ?>
                                  @elseif(request()->session()->get('multiple_expense_gst_paid') != '' && (request()->session()->get('multiple_expense_gst_paid') != '0'))
                                      <?php $b_expense_gst_paid = request()->session()->get('multiple_expense_gst_paid'); 
                                            $b_expense_gst_paid = number_format((float)request()->session()->get('multiple_expense_gst_paid'), 2, '.', '');
                                      ?>
                                  @else
                                      <?php $b_expense_gst_paid = number_format((float)0, 2, '.', ''); ?>
                                  @endif
                                  <input type="text" value="{{$b_expense_gst_paid}}" class="form-control wizard-required" readonly id="b_expense_gst_paid" name="b_expense_gst_paid">
                              </div>
                              <h5>9 (1A-1B) - GST Payable Amount</h5>
                              <div class="form-group">
                                  @if($a_income_gst_collected != '' && $b_expense_gst_paid != '')
                                      <?php $gst_payable_amount = number_format((float)($a_income_gst_collected - $b_expense_gst_paid), 2, '.', ''); ?>
                                  @else
                                      <?php $gst_payable_amount = number_format((float)0, 2, '.', ''); ?>
                                  @endif
                                  <input type="text" value="{{$gst_payable_amount}}" class="form-control wizard-required" readonly id="gst_payable_amount" name="gst_payable_amount">
                              </div>
                              <!-- <div class="form-group">
                                @if($substype != 2)
                                  <label>Login to Your <a href="#_" target="_blank">My Gov</a> and Submit</label><br>
                                @else
                                  <label>We will submit your data to the portal, Thanks</label><br>
                                @endif
                                <label>Download your Free Reports</label>
                                <br>
                                <a href="javascript:void(0);" onclick="download_report();" class="form-wizard-next-btn float-lefta">Download</a>
                                <a href="javascript:void(0);" onclick="download_full_report();" class="form-wizard-next-btn float-lefta">Download Full Report</a>
                                <a href="javascript:void(0);" onclick="download_profitloss_report();" class="form-wizard-next-btn float-lefta">Download Profit/Loss Report</a>
                                <a href="{{ URL::to('/') }}/generate-charts" class="form-wizard-next-btn float-lefta">View Charts</a>
                              </div> -->
                              <div class="form-group">
                                  <label style="border: 1px solid; padding: 5px;border-radius: 4px; font-size: 16px;
    color: #70C5A4;">Report generated, check detail view page to download reports</label><br>
                              </div>
                              <div class="form-group clearfix">
                                  <!-- <a href="javascript:void(0);" onclick="goBack()" class="form-wizard-next-btn float-left">Previous</a> -->
                              
                                  <!-- <a href="javascript:void(0);" onclick="$('#st1').submit()" class="form-wizard-next-btn float-right">Next</a> -->
                              </div>

                              @else 
                                  
                                  <h4>Thanks for submitting your data</h4><br>
                                  <h5>We will generate your reports and submit to the portal</h5>

                              @endif

                              
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

function download_report(){
    var don =  "{{ URL::to('/') }}/generate-report"; // 1 for income
    window.location = don;
}

function download_full_report(){
    var don =  "{{ URL::to('/') }}/generate-full-report"; // 1 for income
    window.location = don; 
}

function download_profitloss_report(){
    var don =  "{{ URL::to('/') }}/generate-profitloss-report"; // 1 for income
    window.location = don; 
}



function goBack() {
  window.history.back();
}

function period_type(st){
  if(st == 1){
    $('#table2').show();
    $('#table1').hide();
  }else if(st == 2){
    $('#table1').show();
    $('#table2').hide();
  }
}

function add_all_input_single_income(st){
  // single_income
  // $('#single_total').val();
  var tot=0;var g;
  $('.single_income').each(function(index) {
        if($(this).val() != ''){
          // alert(parseFloat($(this).val()));
          g = parseFloat($(this).val());
          tot = parseFloat(tot) + parseFloat(g);
        }
    });
  $('#single_income_total').val(tot);
}

function add_all_input_multiple_income(st){
  // single_income
  // $('#single_total').val();
  var tot=0;var g;
  $('.multiple_income').each(function(index) {
        if($(this).val() != ''){
          // alert(parseFloat($(this).val()));
          g = parseFloat($(this).val());
          tot = parseFloat(tot) + parseFloat(g);
        }
    });
  $('#multiple_income_total').val(tot);
}


jQuery(document).ready(function() {
    add_all_input_single_income();
    add_all_input_multiple_income();
    $.ajax({
      url: "{{ URL::to('/') }}/get_period_val/1", // 1 for income
      context: document.body
    }).done(function(d) {
      // $( this ).addClass( "done" );
      // alert(d);
      period_type(d);
    });


    // click on next button
    jQuery('.form-wizard-next-btn').click(function(e) {
          e.preventDefault();
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        var next = jQuery(this);
        var nextWizardStep = false;
        parentFieldset.find('.wizard-required').each(function(){
            var thisValue = jQuery(this).val();

            if( thisValue == "") {
            
                jQuery(this).siblings(".wizard-form-error").slideDown();
                nextWizardStep = false;
            }
            else {
            nextWizardStep=true;
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
        if(nextWizardStep === true){
          location.href=$(this).attr('href');
        }
    });
    //click on previous button
    jQuery('.form-wizard-previous-btn').click(function() {
        var counter = parseInt(jQuery(".wizard-counter").text());;
        var prev =jQuery(this);
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        prev.parents('.wizard-fieldset').removeClass("show","400");
        prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
        currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
        jQuery(document).find('.wizard-fieldset').each(function(){
            if(jQuery(this).hasClass('show')){
                var formAtrr = jQuery(this).attr('data-tab-content');
                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                    if(jQuery(this).attr('data-attr') == formAtrr){
                        jQuery(this).addClass('active');
                        var innerWidth = jQuery(this).innerWidth();
                        var position = jQuery(this).position();
                        jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                    }else{
                        jQuery(this).removeClass('active');
                    }
                });
            }
        });
    });
    //click on form submit button
    jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        parentFieldset.find('.wizard-required').each(function() {
            var thisValue = jQuery(this).val();
            if( thisValue == "" ) {
                jQuery(this).siblings(".wizard-form-error").slideDown();
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
    });
    // focus on input field check empty or not
    jQuery(".form-control").on('focus', function(){
        var tmpThis = jQuery(this).val();
        if(tmpThis == '' ) {
            jQuery(this).parent().addClass("focus-input");
        }
        else if(tmpThis !='' ){
            jQuery(this).parent().addClass("focus-input");
        }
    }).on('blur', function(){
        var tmpThis = jQuery(this).val();
        if(tmpThis == '' ) {
            jQuery(this).parent().removeClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideDown("3000");
        }
        else if(tmpThis !='' ){
            jQuery(this).parent().addClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideUp("3000");
        }
    });
});

         </script>
@endsection