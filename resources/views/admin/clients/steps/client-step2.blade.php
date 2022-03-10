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
        background-image: url("http://i.ibb.co/X292hJF/form-wizard-bg-2.jpg");
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
        padding: 6px;
        color: #888888;
        background-color: #f1f1f1;
        border: 1px solid #ced4da;
      }
      .form-wizard .form-control:focus {
        box-shadow: none;
      }
      .form-wizard .form-group {
        position: relative;
        margin: 25px 0;
      }
      .partition-blue .form-group {
       
        margin: 0px 0;
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
      .list-group-item {

      padding: 1.75rem 1.25rem !important; 

      }
</style>
<style>
    .partition-blue {
        border: 1px solid #a8a8a8;
        padding: 10px;
        border-radius: 5px;
    }
    .delete_member_program2 {
        color: rgb(194, 47, 40) !important;
        z-index: 1;
        position: relative;
        top: -10px;
        float: right;
    }
    .modal-dialog {
    max-width: 966px;
    width: 100% !important;
    margin: 1.75rem auto;
    }
    h4.modal-title {
        font-size: 20px !important;
        color: #5A55A3 !important;
        text-transform: uppercase !important;
        font-weight: 700 !important;
    }
    .modal-header .close {
        margin-top: 0;
        color: #000 !important;
    }
    .close {
        color: white !important;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        opacity: 1;
        font-weight: bold;
    }
    
    .nav-link {
      padding: .5rem 1rem !important;
    }
    .form-wizard .form-wizard-next-btn:hover, .form-wizard .form-wizard-next-btn:focus, .form-wizard .form-wizard-previous-btn:hover, .form-wizard .form-wizard-previous-btn:focus, .form-wizard .form-wizard-submit:hover, .form-wizard .form-wizard-submit:focus,
    .form-wizard .form-wizard-next-btn, .form-wizard .form-wizard-previous-btn, .form-wizard .form-wizard-submit
    {
      color: #ffffff !important;
      background-color: #d65470 !important;
    }
    .list-group-item {
      padding: 1.75rem 1.25rem !important; 
    }
    .member_programs3 .form-group {
      margin: 0px 0 0px 0;
    }  
    .onlyteesharemembershipprogram { padding: 0px !important;}
    .form-wizard .form-control { margin-right: 10px;}
    .sorting_1 div.lab { padding: 0px; }
    .sorting_1 label { font-size: 12px; font-weight: normal; }
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
              <div class="col-lg-1 col-md-1 offset-md-0">
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-container" style="height:550px;margin-top: 100px;">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-menu" style="padding:20px;">
                    <div class="list-group">
                      <a href="javascript:void(0);{{ URL::to('/') }}/step-0" class="list-group-item  text-center">
                       <i class="fa fa-road" aria-hidden="true"></i><br>SELECT INCOME/EXPENSE
                      </a>
                      <a href="javascript:void(0);{{ URL::to('/') }}/step-1" class="list-group-item text-center">
                      <i class="fa fa-road" aria-hidden="true"></i><br>INCOME
                      </a>
                      <a href="javascript:void(0);step-2" class="list-group-item active text-center">
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
                      <form action="step-3" method="post" role="form" id="st1">
                        <!-- <div class="onlyteesharemembershipprogram">
                              <div class="panel-body__ member_program_section2">
                                  <a href="javascript:void(0);" class="add_member_programs2___ btn btn-info" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager80" href="javascript:;" data-toggle="modal">Add Your Invoices</a>
                                  <div id="member_programs3" class="member_programs3" style="display: block;">
                                    <a href="javascript:void(0);" class="delete_member_program2" style="color: red;font-size: 18px;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
                                    <div class="panel-body11">
                                        <div class="form-group">
                                            {!! Form::label('invoices', 'Invoices') !!}
                                            <div class="input-group">
                                                {!! Form::text('invoices2[]', null, array('class' => 'form-control myinput', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoices', 'id' => 'invoices')) !!}
                                                <span class="input-group-btn">
                                                    <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager80" href="javascript:;" data-toggle="modal">
                                                        <span class="glyphicon1 glyphicon-picture1">Add Your Invoices</span>
                                                    </button>
                                                </span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                  </div> 
                                  <div class="modal fade mymodal" id="fileManager80">  
                                      <div class="modal-dialog" style="width:65%;">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">File Manager</h4>
                                          </div>
                                          <div class="modal-body" style="padding:0px; margin:0px;">
                                            <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=invoices&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                          </div> -->
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <fieldset class="wizard-fieldset show">
                              <h5>Expense Sheet</h5>
                              <label for="sel1" style="display:none;">Select 3 months or single month</label>
                              <div class="form-group" style="display:none;">
                                  <div class="wizard-form-radio">
                                      <input name="period_sel_expense" value="1" @if(old('period_sel_expense') == 1 || request()->session()->get('period_sel_income') == 1) checked @endif id="radio1" type="radio" onclick="period_type(1);">
                                      <label for="radio1">3 Months Period</label>
                                  </div>
                                  <div class="wizard-form-radio">
                                      <input name="period_sel_expense" value="2" @if(old('period_sel_expense') == 2 || request()->session()->get('period_sel_income') == 2) checked @endif id="radio2" type="radio" onclick="period_type(2);">
                                      <label for="radio2">Single Month Period</label>
                                  </div>
                              </div>

                              @if($substype == 3)

                              <table class="table table-bordered table-order" id="table1"  @if(old('period_sel_expense') == 2 || request()->session()->get('period_sel_income') == 2) style="display:block;" @else style="display:none;" @endif>
                                  <thead> 
                                    <tr role="row" class="odd">                                       
                                        <th class="sorting_1" width="25%">
                                            Selected Expense
                                        </th>
                                        <?php 
                                          $month_num = $q_period; 
                                        ?>
                                        @for($f=0;$f<3;$f++)
                                          <th class="sorting_1" width="25%">
                                            <?php 
                                            $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                                            echo $month_name."\n"; 
                                            $month_num++;
                                            ?>
                                          </th>
                                        @endfor  
                                    </tr>    
                                  </thead> 
                                  <tbody> 
                                      @for($k=0; $k<count($sel_expenses); $k++)
                                          <tr role="row" class="odd">                                       
                                              <td class="sorting_1" width="20%">
                                                  <?php
                                                  $parts = explode('_', $sel_expenses[$k]);
                                                  // print_r($parts);
                                                  ?>
                                                  {{$parts[0]}}
                                              </td>
                                              <td class="sorting_1">
                                                <div class="lab @if($parts[2] == 1) col-md-12 @else col-md-12 @endif">
                                                  <label>Expense</label>
                                                  <input placeholder="$" required type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="expense" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense form-control wizard-required" name="multiple_expense_vals[{{$k}}][0]" value="@if(null !== (request()->session()->get('multiple_expense_vals')[$k][0])){{request()->session()->get('multiple_expense_vals')[$k][0]}}@endif" />
                                                </div>

                                                @if($parts[3] == 2)
                                                <div class="lab col-md- col-md-12">
                                                  <label>Date</label>
                                                  <input placeholder="dd/mm/yyyy" required type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Date" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_date_vals form-control wizard-required" name="multiple_expense_date_vals[{{$k}}][0]" value="@if(null !== (request()->session()->get('multiple_expense_date_vals')[$k][0])){{request()->session()->get('multiple_expense_date_vals')[$k][0]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12">
                                                  <label>Make/Model</label>
                                                  <input placeholder="Make &amp; Model" required type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Make/Model" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_makemodel_vals form-control wizard-required" name="multiple_expense_makemodel_vals[{{$k}}][0]" value="@if(null !== (request()->session()->get('multiple_expense_makemodel_vals')[$k][0])){{request()->session()->get('multiple_expense_makemodel_vals')[$k][0]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12">
                                                  <label>Business Percent</label>
                                                  <input placeholder="%" required type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Business Percent" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_business_percent_vals form-control wizard-required" name="multiple_expense_business_percent_vals[{{$k}}][0]" value="@if(null !== (request()->session()->get('multiple_expense_business_percent_vals')[$k][0])){{request()->session()->get('multiple_expense_business_percent_vals')[$k][0]}}@endif" />
                                                </div>
                                                @else
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Date</label>
                                                  <input placeholder="dd/mm/yyyy"  type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Date" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_date_vals novalidation form-control wizard-required" name="multiple_expense_date_vals[{{$k}}][0]" value="@if(null !== (request()->session()->get('multiple_expense_date_vals')[$k][0])){{request()->session()->get('multiple_expense_date_vals')[$k][0]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Make/Model</label>
                                                  <input placeholder="Make &amp; Model"  type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Make/Model" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_makemodel_vals novalidation form-control wizard-required" name="multiple_expense_makemodel_vals[{{$k}}][0]" value="@if(null !== (request()->session()->get('multiple_expense_makemodel_vals')[$k][0])){{request()->session()->get('multiple_expense_makemodel_vals')[$k][0]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Business Percent</label>
                                                  <input placeholder="%"  type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Business Percent" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_business_percent_vals novalidation form-control wizard-required" name="multiple_expense_business_percent_vals[{{$k}}][0]" value="@if(null !== (request()->session()->get('multiple_expense_business_percent_vals')[$k][0])){{request()->session()->get('multiple_expense_business_percent_vals')[$k][0]}}@endif" />
                                                </div>
                                                @endif


                                                <div class="lab col-md-6" style="@if($parts[2] == 1)display:none; margin-right:0px;  @else display:none; @endif">
                                                  <label>Your Percent</label>
                                                  <input placeholder="%" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" type="number" style="@if($parts[2] == 1)display:block; margin-right:0px;  @else display:none; @endif"  data-toggle="tooltip" data-placement="top" title="add your percent here" class="col-md-12 multiple_expense_percent form-control wizard-required" name="multiple_expense_percent[{{$k}}][0]" value="@if(null !== (request()->session()->get('multiple_expense_percent')[$k][0])){{request()->session()->get('multiple_expense_percent')[$k][0]}}@else{{$parts[1]}}@endif" />
                                                </div>

                                                  <div class="onlyteesharemembershipprogram  col-md-12">
                                                    <label>Invoice</label>
                                                    <div class="panel-body__ member_program_section2">
                                                        <div id="member_programs3" class="member_programs3" style="display: block;">
                                                          <div class="panel-body11">
                                                              <div class="form-group">
                                                                  
                                                                  <div class="input-group">
                                                                      {!! Form::text('multiple_expense_invoices['.$k.'][0]', null, array('class' => 'form-control myinput', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoice', 'id' => 'invoices'.$k)) !!}
                                                                      <span class="input-group-btn">
                                                                          <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{$k}}" href="javascript:;" data-toggle="modal">
                                                                              <span class="fa fa-camera"></span>
                                                                          </button>
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="modal fade mymodal" id="fileManager{{$k}}">  
                                                            <div class="modal-dialog" style="width:65%;">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">File Manager</h4>
                                                                </div>
                                                                <div class="modal-body" style="padding:0px; margin:0px;">
                                                                  <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'.$k.'&relative_url=1&fldr=&rootFolder='.$user->client->client_number.'_'.$user->client->client_folder_time.'&multiple=0&create_folders=0') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </td>
                                              <td class="sorting_1">
                                                <div class="lab @if($parts[2] == 1) col-md-12 @else col-md-12 @endif">
                                                  <label>Expense</label>  
                                                  <input placeholder="$" required type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="expense" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense form-control wizard-required" name="multiple_expense_vals[{{$k}}][1]" value="@if(null !== (request()->session()->get('multiple_expense_vals')[$k][1])){{request()->session()->get('multiple_expense_vals')[$k][1]}}@endif" />
                                                </div>

                                                @if($parts[3] == 2)
                                                <div class="lab col-md- col-md-12">
                                                  <label>Date</label>
                                                  <input placeholder="dd/mm/yyyy" required type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Date" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_date_vals form-control wizard-required" name="multiple_expense_date_vals[{{$k}}][1]" value="@if(null !== (request()->session()->get('multiple_expense_date_vals')[$k][1])){{request()->session()->get('multiple_expense_date_vals')[$k][1]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12">
                                                  <label>Make/Model</label>
                                                  <input placeholder="Make &amp; Model" required type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Make/Model" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_makemodel_vals form-control wizard-required" name="multiple_expense_makemodel_vals[{{$k}}][1]" value="@if(null !== (request()->session()->get('multiple_expense_makemodel_vals')[$k][1])){{request()->session()->get('multiple_expense_makemodel_vals')[$k][1]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12">
                                                  <label>Business Percent</label>
                                                  <input placeholder="%" required type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Business Percent" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_business_percent_vals form-control wizard-required" name="multiple_expense_business_percent_vals[{{$k}}][1]" value="@if(null !== (request()->session()->get('multiple_expense_business_percent_vals')[$k][1])){{request()->session()->get('multiple_expense_business_percent_vals')[$k][1]}}@endif" />
                                                </div>
                                                @else
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Date</label>
                                                  <input placeholder="dd/mm/yyyy"  type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Date" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_date_vals novalidation form-control wizard-required" name="multiple_expense_date_vals[{{$k}}][1]" value="@if(null !== (request()->session()->get('multiple_expense_date_vals')[$k][1])){{request()->session()->get('multiple_expense_date_vals')[$k][1]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Make/Model</label>
                                                  <input placeholder="Make &amp; Model"  type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Make/Model" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_makemodel_vals novalidation form-control wizard-required" name="multiple_expense_makemodel_vals[{{$k}}][1]" value="@if(null !== (request()->session()->get('multiple_expense_makemodel_vals')[$k][1])){{request()->session()->get('multiple_expense_makemodel_vals')[$k][1]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Business Percent</label>
                                                  <input placeholder="%"  type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Business Percent" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_business_percent_vals novalidation form-control wizard-required" name="multiple_expense_business_percent_vals[{{$k}}][1]" value="@if(null !== (request()->session()->get('multiple_expense_business_percent_vals')[$k][1])){{request()->session()->get('multiple_expense_business_percent_vals')[$k][1]}}@endif" />
                                                </div>
                                                @endif

                                                <div class="lab col-md-6" style="@if($parts[2] == 1)display:none; margin-right:0px;  @else display:none; @endif">
                                                  <label>Your Percent</label>  
                                                  <input placeholder="%" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" type="number" style="@if($parts[2] == 1)display:block; margin-right:0px;  @else display:none; @endif"  data-toggle="tooltip" data-placement="top" title="add your percent here" class="col-md-12 multiple_expense_percent form-control wizard-required" name="multiple_expense_percent[{{$k}}][1]" value="@if(null !== (request()->session()->get('multiple_expense_percent')[$k][1])){{request()->session()->get('multiple_expense_percent')[$k][1]}}@else{{$parts[1]}}@endif" />
                                                </div>

                                                  <div class="onlyteesharemembershipprogram col-md-12">
                                                    <label>Invoice</label>
                                                    <div class="panel-body__ member_program_section2">
                                                        <div id="member_programs3" class="member_programs3" style="display: block;">
                                                          <div class="panel-body11">
                                                              <div class="form-group">
                                                                  
                                                                  <div class="input-group">
                                                                      {!! Form::text('multiple_expense_invoices['.$k.'][1]', null, array('class' => 'form-control myinput', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoice', 'id' => 'invoices'.$k.$k)) !!}
                                                                      <span class="input-group-btn">
                                                                          <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{$k}}{{$k}}" href="javascript:;" data-toggle="modal">
                                                                              <span class="fa fa-camera"></span>
                                                                          </button>
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="modal fade mymodal" id="fileManager{{$k}}{{$k}}">  
                                                            <div class="modal-dialog" style="width:65%;">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">File Manager</h4>
                                                                </div>
                                                                <div class="modal-body" style="padding:0px; margin:0px;">
                                                                  <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'.$k.$k.'&relative_url=1&fldr=&rootFolder='.$user->client->client_number.'_'.$user->client->client_folder_time.'&multiple=0&create_folders=0') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </td>
                                              <td class="sorting_1">
                                                <div class="lab @if($parts[2] == 1) col-md-12 @else col-md-12 @endif">
                                                  <label>Expense</label>  
                                                  <input placeholder="$" required type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="expense" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense form-control wizard-required" name="multiple_expense_vals[{{$k}}][2]" value="@if(null !== (request()->session()->get('multiple_expense_vals')[$k][2])){{request()->session()->get('multiple_expense_vals')[$k][2]}}@endif" />
                                                </div>

                                                @if($parts[3] == 2)
                                                <div class="lab col-md- col-md-12">
                                                  <label>Date</label>
                                                  <input placeholder="dd/mm/yyyy" required type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Date" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_date_vals form-control wizard-required" name="multiple_expense_date_vals[{{$k}}][2]" value="@if(null !== (request()->session()->get('multiple_expense_date_vals')[$k][2])){{request()->session()->get('multiple_expense_date_vals')[$k][2]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12">
                                                  <label>Make/Model</label>
                                                  <input placeholder="Make &amp; Model" required type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Make/Model" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_makemodel_vals form-control wizard-required" name="multiple_expense_makemodel_vals[{{$k}}][2]" value="@if(null !== (request()->session()->get('multiple_expense_makemodel_vals')[$k][2])){{request()->session()->get('multiple_expense_makemodel_vals')[$k][2]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12">
                                                  <label>Business Percent</label>
                                                  <input placeholder="%" required type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Business Percent" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_business_percent_vals form-control wizard-required" name="multiple_expense_business_percent_vals[{{$k}}][2]" value="@if(null !== (request()->session()->get('multiple_expense_business_percent_vals')[$k][2])){{request()->session()->get('multiple_expense_business_percent_vals')[$k][2]}}@endif" />
                                                </div>
                                                @else
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Date</label>
                                                  <input placeholder="dd/mm/yyyy"  type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Date" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_date_vals novalidation form-control wizard-required" name="multiple_expense_date_vals[{{$k}}][2]" value="@if(null !== (request()->session()->get('multiple_expense_date_vals')[$k][2])){{request()->session()->get('multiple_expense_date_vals')[$k][2]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Make/Model</label>
                                                  <input placeholder="Make &amp; Model"  type="text" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Make/Model" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_makemodel_vals novalidation form-control wizard-required" name="multiple_expense_makemodel_vals[{{$k}}][2]" value="@if(null !== (request()->session()->get('multiple_expense_makemodel_vals')[$k][2])){{request()->session()->get('multiple_expense_makemodel_vals')[$k][2]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-12" style="display:none;">
                                                  <label>Business Percent</label>
                                                  <input placeholder="%"  type="number" min='0' onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" data-toggle="tooltip" data-placement="top" title="Business Percent" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif multiple_expense_business_percent_vals novalidation form-control wizard-required" name="multiple_expense_business_percent_vals[{{$k}}][2]" value="@if(null !== (request()->session()->get('multiple_expense_business_percent_vals')[$k][2])){{request()->session()->get('multiple_expense_business_percent_vals')[$k][2]}}@endif" />
                                                </div>
                                                @endif

                                                <div class="lab col-md-6" style="@if($parts[2] == 1)display:none; margin-right:0px;  @else display:none; @endif">
                                                  <label>Your Percent</label>  
                                                  <input placeholder="%" onkeyup="add_all_input_multiple_expense();" onchange="add_all_input_multiple_expense()" type="number" style="@if($parts[2] == 1)display:block; margin-right:0px;  @else display:none; @endif"  data-toggle="tooltip" data-placement="top" title="add your percent here" class="col-md-12 multiple_expense_percent form-control wizard-required" name="multiple_expense_percent[{{$k}}][2]" value="@if(null !== (request()->session()->get('multiple_expense_percent')[$k][2])){{request()->session()->get('multiple_expense_percent')[$k][2]}}@else{{$parts[1]}}@endif" />
                                                </div>

                                                  <div class="onlyteesharemembershipprogram col-md-12">
                                                    <label>Invoice</label>
                                                    <div class="panel-body__ member_program_section2">
                                                        <div id="member_programs3" class="member_programs3" style="display: block;">
                                                          <div class="panel-body11">
                                                              <div class="form-group">
                                                                  
                                                                  <div class="input-group">
                                                                      {!! Form::text('multiple_expense_invoices['.$k.'][2]', null, array('class' => 'form-control myinput', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoice', 'id' => 'invoices'.$k.$k.$k)) !!}
                                                                      <span class="input-group-btn">
                                                                          <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{$k}}{{$k}}{{$k}}" href="javascript:;" data-toggle="modal">
                                                                              <span class="fa fa-camera"></span>
                                                                          </button>
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="modal fade mymodal" id="fileManager{{$k}}{{$k}}{{$k}}">  
                                                            <div class="modal-dialog" style="width:65%;">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">File Manager</h4>
                                                                </div>
                                                                <div class="modal-body" style="padding:0px; margin:0px;">
                                                                  <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'.$k.$k.$k.'&relative_url=1&fldr=&rootFolder='.$user->client->client_number.'_'.$user->client->client_folder_time.'&multiple=0&create_folders=0') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </td>
                                          </tr>                                    
                                      @endfor
                                  </tbody>
                                  <tfoot>
                                    <tr role="row" class="odd">                                       
                                        <td class="sorting_1" width="20%">
                                            Total expense for the period
                                        </td>
                                        <td class="sorting_1" colspan="1">
                                            <input type="text" id="multiple_expense_total" name="multiple_expense_total" readonly class="form-control wizard-required" data-toggle="tooltip" data-placement="top" title="Expense Total" name="multiple_expense_total" value="" />
                                        </td>
                                        <td class="sorting_1" width="20%">
                                            GST Paid
                                        </td>
                                        <td class="sorting_1" colspan="1">
                                            <input type="number" min="0" id="multiple_expense_gst_paid" name="multiple_expense_gst_paid" readonly class="form-control wizard-required" data-toggle="tooltip" data-placement="top" title="GST Paid Total" name="multiple_expense_gst_paid" value="@if(null !== request()->session()->get('multiple_expense_gst_paid')){{request()->session()->get('multiple_expense_gst_paid')}}@endif" />
                                        </td>
                                    </tr>
                                  </tfoot>
                              </table>

                              <table class="table table-bordered table-order" id="table2"  @if(old('period_sel_expense') == 2 || request()->session()->get('period_sel_income') == 2) style="display:block;" @else style="display:none;" @endif>
                                  <thead> 
                                    <tr role="row" class="odd">                                       
                                        <th class="sorting_1" width="25%" colspan="1">
                                            Selected Expense
                                        </th>
                                        <?php 
                                          $month_num = $q_period; 
                                          $month_name = '';
                                          $month_name2 = '';
                                        ?>
                                        @for($f=0;$f<3;$f++)
                                            <?php 
                                            $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                                            // echo $month_name."\n"; 
                                            $month_name2 .= $month_name . ' - ';
                                            $month_num++;
                                            ?>
                                        @endfor  
                                          <th class="sorting_1" width="75%" colspan="3">
                                            <?php echo $month_name2 .'(3 Months Tenure)';?>
                                          </th>
                                    </tr>    
                                  </thead> 
                                  <tbody> 
                                      @for($k=0; $k<count($sel_expenses); $k++)
                                          <tr role="row" class="odd">                                       
                                              <td class="sorting_1" width="20%" colspan="1">
                                                  <?php
                                                  $parts = explode('_', $sel_expenses[$k]);
                                                  // print_r($parts);
                                                  ?>
                                                  {{$parts[0]}}
                                              </td>
                                              <td class="sorting_1" colspan="3">
                                                <div class="lab @if($parts[2] == 1) col-md-5 @else col-md-5 @endif" style="margin-right:20px; @if($parts[2] == 1) margin-right:20px;@else  @endif">
                                                  <label>Expense</label>  
                                                  <input placeholder="$" required onkeyup="add_all_input_single_expense(this);" onchange="add_all_input_single_expense(this)" type="number" min='0' data-toggle="tooltip" data-placement="top" title="expense" style="@if($parts[2] == 1)  @else margin-right:20px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif single_expense form-control wizard-required" name="single_expense_vals[{{$k}}]" value="@if(null !== (request()->session()->get('single_expense_vals')[$k])){{request()->session()->get('single_expense_vals')[$k]}}@endif" />
                                                </div>


                                                @if($parts[3] == 2)
                                                <div class="lab col-md- col-md-5" style="margin-right:20px;">
                                                  <label>Date</label>
                                                  <input placeholder="dd/mm/yyyy" required type="text" onkeyup="add_all_input_single_expense();" onchange="add_all_input_single_expense()" data-toggle="tooltip" data-placement="top" title="Date" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif single_expense_date_vals form-control wizard-required" name="single_expense_date_vals[{{$k}}]" value="@if(null !== (request()->session()->get('single_expense_date_vals')[$k])){{request()->session()->get('single_expense_date_vals')[$k]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-5" style="margin-right:20px;">
                                                  <label>Make/Model</label>
                                                  <input placeholder="Make &amp; Model" required type="text" onkeyup="add_all_input_single_expense();" onchange="add_all_input_single_expense()" data-toggle="tooltip" data-placement="top" title="Make/Model" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif single_expense_makemodel_vals form-control wizard-required" name="single_expense_makemodel_vals[{{$k}}]" value="@if(null !== (request()->session()->get('single_expense_makemodel_vals')[$k])){{request()->session()->get('single_expense_makemodel_vals')[$k]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-5" style="margin-right:20px;">
                                                  <label>Business Percent</label>
                                                  <input placeholder="%" required type="number" min='0' onkeyup="add_all_input_single_expense();" onchange="add_all_input_single_expense()" data-toggle="tooltip" data-placement="top" title="Business Percent" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif single_expense_business_percent_vals form-control wizard-required" name="single_expense_business_percent_vals[{{$k}}]" value="@if(null !== (request()->session()->get('single_expense_business_percent_vals')[$k])){{request()->session()->get('single_expense_business_percent_vals')[$k]}}@endif" />
                                                </div>
                                                @else
                                                <div class="lab col-md- col-md-5" style="margin-right:20px;display:none;">
                                                  <label>Date</label>
                                                  <input placeholder="dd/mm/yyyy" type="text" onkeyup="add_all_input_single_expense();" onchange="add_all_input_single_expense()" data-toggle="tooltip" data-placement="top" title="Date" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif single_expense_date_vals novalidation form-control wizard-required" name="single_expense_date_vals[{{$k}}]" value="@if(null !== (request()->session()->get('single_expense_date_vals')[$k])){{request()->session()->get('single_expense_date_vals')[$k]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-5" style="margin-right:20px;display:none;">
                                                  <label>Make/Model</label>
                                                  <input placeholder="Make &amp; Model" type="text" onkeyup="add_all_input_single_expense();" onchange="add_all_input_single_expense()" data-toggle="tooltip" data-placement="top" title="Make/Model" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif single_expense_makemodel_vals novalidation form-control wizard-required" name="single_expense_makemodel_vals[{{$k}}]" value="@if(null !== (request()->session()->get('single_expense_makemodel_vals')[$k])){{request()->session()->get('single_expense_makemodel_vals')[$k]}}@endif" />
                                                </div>
                                                <div class="lab col-md- col-md-5" style="margin-right:20px;display:none;">
                                                  <label>Business Percent</label>
                                                  <input placeholder="%" type="number" min='0' onkeyup="add_all_input_single_expense();" onchange="add_all_input_single_expense()" data-toggle="tooltip" data-placement="top" title="Business Percent" style="@if($parts[2] == 1) margin-right:0px;  @else margin-right:0px; @endif" class="@if($parts[2] == 1) col-md-12 @else col-md-12 @endif single_expense_business_percent_vals novalidation form-control wizard-required" name="single_expense_business_percent_vals[{{$k}}]" value="@if(null !== (request()->session()->get('single_expense_business_percent_vals')[$k])){{request()->session()->get('single_expense_business_percent_vals')[$k]}}@endif" />
                                                </div>
                                                @endif


                                                <div class="lab col-md-5" style="margin-right:20px; @if($parts[2] == 1)display:none; margin-right:10px;@else display:none; @endif">
                                                  <label>Your Percent</label>  
                                                  <input placeholder="%" onkeyup="add_all_input_single_expense(this);" onchange="add_all_input_single_expense(this)" type="number" style="@if($parts[2] == 1)display:block;@else display:none; @endif"  data-toggle="tooltip" data-placement="top" title="add your percent here" class="col-md-12 single_expense_percent form-control wizard-required" name="single_expense_percent[{{$k}}]" value="@if(null !== (request()->session()->get('single_expense_percent')[$k])){{request()->session()->get('single_expense_percent')[$k]}}@else{{$parts[1]}}@endif" />
                                                </div>

                                                  <div class="onlyteesharemembershipprogram  @if($parts[2] == 1) col-md-5 @else col-md-5 @endif ">
                                                    <label>Invoice</label>
                                                    <div class="panel-body__ member_program_section2">
                                                        <div id="member_programs3" class="member_programs3" style="display: block;">
                                                          <div class="panel-body11">
                                                              <div class="form-groupp">
                                                                  
                                                                  <div class="input-group">
                                                                      {!! Form::text('single_expense_invoices['.$k.']', null, array('class' => 'form-control myinput', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoice', 'id' => 'invoices'.$k.$k.$k.$k)) !!}
                                                                      <span class="input-group-btn">
                                                                          <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{$k}}{{$k}}{{$k}}{{$k}}" href="javascript:;" data-toggle="modal">
                                                                              <span class="fa fa-camera"></span>
                                                                          </button>
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="modal fade mymodal" id="fileManager{{$k}}{{$k}}{{$k}}{{$k}}">  
                                                            <div class="modal-dialog" style="width:65%;">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">File Manager</h4>
                                                                </div>
                                                                <div class="modal-body" style="padding:0px; margin:0px;">
                                                                  <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'.$k.$k.$k.$k.'&relative_url=1&fldr=&rootFolder='.$user->client->client_number.'_'.$user->client->client_folder_time.'&multiple=0&create_folders=0') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </td>
                                          </tr>                                    
                                      @endfor
                                  </tbody>
                                  <tfoot>
                                    <tr role="row" class="odd" >                                       
                                        <td class="sorting_1" width="25%">
                                            Total expense for the period
                                        </td>
                                        <td class="sorting_1">
                                            <input type="text" id="single_expense_total" name="single_expense_total" readonly class="form-control wizard-required" data-toggle="tooltip" data-placement="top" title="Expense Total" name="single_expense_total" value="" />
                                        </td>
                                        <td class="sorting_1"  width="25%" >
                                            GST Paid
                                        </td>
                                        <td class="sorting_1">
                                            <input type="number" min="0" id="single_expense_gst_paid" name="single_expense_gst_paid" readonly class="form-control wizard-required" data-toggle="tooltip" data-placement="top" title="GST Paid Total" name="single_expense_gst_paid" value="@if(null !== request()->session()->get('single_expense_gst_paid')){{request()->session()->get('single_expense_gst_paid')}}@endif" />
                                        </td>
                                    </tr>
                                  </tfoot>
                              </table>

                              @else

                              <table class="table table-bordered table-order" id="table1"  @if(old('period_sel_expense') == 2 || request()->session()->get('period_sel_income') == 2) style="display:block;" @else style="display:none;" @endif>
                                  <thead> 
                                    <tr role="row" class="odd">                                       
                                        <th class="sorting_1" width="25%">
                                            Selected Expense
                                        </th>
                                        <?php 
                                          $month_num = $q_period; 
                                        ?>
                                        @for($f=0;$f<3;$f++)
                                          <th class="sorting_1" width="25%">
                                            <?php 
                                            $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                                            echo $month_name."\n"; 
                                            $month_num++;
                                            ?>
                                          </th>
                                        @endfor  
                                    </tr>    
                                  </thead> 
                                  <tbody> 
                                      @for($k=0; $k<count($sel_expenses); $k++)
                                          <tr role="row" class="odd">                                       
                                              <td class="sorting_1" width="20%">
                                                  <?php
                                                  $parts = explode('_', $sel_expenses[$k]);
                                                  // print_r($parts);
                                                  ?>
                                                  {{$parts[0]}}
                                              </td>
                                              <td class="sorting_1">
                                                

                                                  <div class="onlyteesharemembershipprogram  col-md-12">
                                                    <label>Invoice</label>
                                                    <div class="panel-body__ member_program_section2">
                                                        <div id="member_programs3" class="member_programs3" style="display: block;">
                                                          <div class="panel-body11">
                                                              <div class="form-group">
                                                                  
                                                                  <div class="input-group">
                                                                      {!! Form::text('multiple_expense_invoices['.$k.'][0]', null, array('onchange'=>'add_all_input_multiple_expense_3()', 'class' => 'form-control myinput multipleinvoicecl', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoice', 'id' => 'invoices'.$k)) !!}
                                                                      <span class="input-group-btn">
                                                                          <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{$k}}" href="javascript:;" data-toggle="modal">
                                                                              <span class="fa fa-camera"></span>
                                                                          </button>
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="modal fade mymodal" id="fileManager{{$k}}">  
                                                            <div class="modal-dialog" style="width:65%;">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">File Manager</h4>
                                                                </div>
                                                                <div class="modal-body" style="padding:0px; margin:0px;">
                                                                  <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'.$k.'&relative_url=1&fldr=&rootFolder='.$user->client->client_number.'_'.$user->client->client_folder_time.'&multiple=0&create_folders=0') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </td>
                                              <td class="sorting_1">
                                                

                                                  <div class="onlyteesharemembershipprogram col-md-12">
                                                    <label>Invoice</label>
                                                    <div class="panel-body__ member_program_section2">
                                                        <div id="member_programs3" class="member_programs3" style="display: block;">
                                                          <div class="panel-body11">
                                                              <div class="form-group">
                                                                  
                                                                  <div class="input-group">
                                                                      {!! Form::text('multiple_expense_invoices['.$k.'][1]', null, array('onchange'=>'add_all_input_multiple_expense_3()', 'class' => 'form-control myinput multipleinvoicecl', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoice', 'id' => 'invoices'.$k.$k)) !!}
                                                                      <span class="input-group-btn">
                                                                          <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{$k}}{{$k}}" href="javascript:;" data-toggle="modal">
                                                                              <span class="fa fa-camera"></span>
                                                                          </button>
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="modal fade mymodal" id="fileManager{{$k}}{{$k}}">  
                                                            <div class="modal-dialog" style="width:65%;">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">File Manager</h4>
                                                                </div>
                                                                <div class="modal-body" style="padding:0px; margin:0px;">
                                                                  <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'.$k.$k.'&relative_url=1&fldr=&rootFolder='.$user->client->client_number.'_'.$user->client->client_folder_time.'&multiple=0&create_folders=0') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </td>
                                              <td class="sorting_1">
                                                

                                                  <div class="onlyteesharemembershipprogram col-md-12">
                                                    <label>Invoice</label>
                                                    <div class="panel-body__ member_program_section2">
                                                        <div id="member_programs3" class="member_programs3" style="display: block;">
                                                          <div class="panel-body11">
                                                              <div class="form-group">
                                                                  
                                                                  <div class="input-group">
                                                                      {!! Form::text('multiple_expense_invoices['.$k.'][2]', null, array('onchange'=>'add_all_input_multiple_expense_3()', 'class' => 'form-control myinput multipleinvoicecl', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoice', 'id' => 'invoices'.$k.$k.$k)) !!}
                                                                      <span class="input-group-btn">
                                                                          <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{$k}}{{$k}}{{$k}}" href="javascript:;" data-toggle="modal">
                                                                              <span class="fa fa-camera"></span>
                                                                          </button>
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="modal fade mymodal" id="fileManager{{$k}}{{$k}}{{$k}}">  
                                                            <div class="modal-dialog" style="width:65%;">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">File Manager</h4>
                                                                </div>
                                                                <div class="modal-body" style="padding:0px; margin:0px;">
                                                                  <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'.$k.$k.$k.'&relative_url=1&fldr=&rootFolder='.$user->client->client_number.'_'.$user->client->client_folder_time.'&multiple=0&create_folders=0') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </td>
                                          </tr>                                    
                                      @endfor
                                  </tbody>

                              </table>

                              <table class="table table-bordered table-order" id="table2"  @if(old('period_sel_expense') == 2 || request()->session()->get('period_sel_income') == 2) style="display:block;" @else style="display:none;" @endif>
                                  <thead> 
                                    <tr role="row" class="odd">                                       
                                        <th class="sorting_1" width="25%" colspan="1">
                                            Selected Expense
                                        </th>
                                        <?php 
                                          $month_num = $q_period; 
                                          $month_name = '';
                                          $month_name2 = '';
                                        ?>
                                        @for($f=0;$f<3;$f++)
                                            <?php 
                                            $month_name = date("F", mktime(0, 0, 0, $month_num, 10)); 
                                            // echo $month_name."\n"; 
                                            $month_name2 .= $month_name . ' - ';
                                            $month_num++;
                                            ?>
                                        @endfor  
                                          <th class="sorting_1" width="75%" colspan="3">
                                            <?php echo $month_name2 .'(3 Months Tenure)';?>
                                          </th>
                                    </tr>    
                                  </thead> 
                                  <tbody> 
                                      @for($k=0; $k<count($sel_expenses); $k++)
                                          <tr role="row" class="odd">                                       
                                              <td class="sorting_1" width="20%" colspan="1">
                                                  <?php
                                                  $parts = explode('_', $sel_expenses[$k]);
                                                  // print_r($parts);
                                                  ?>
                                                  {{$parts[0]}}
                                              </td>
                                              <td class="sorting_1" colspan="3">
                                                

                                                  <div class="onlyteesharemembershipprogram  @if($parts[2] == 1) col-md-5 @else col-md-5 @endif ">
                                                    <label>Invoice</label>
                                                    <div class="panel-body__ member_program_section2">
                                                        <div id="member_programs3" class="member_programs3" style="display: block;">
                                                          <div class="panel-body11">
                                                              <div class="form-groupp">
                                                                  
                                                                  <div class="input-group">
                                                                      {!! Form::text('single_expense_invoices['.$k.']', null, array('onchange'=>'add_all_input_single_expense_3()', 'class' => 'form-control myinput singleinvoicecl', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoice', 'id' => 'invoices'.$k.$k.$k.$k)) !!}
                                                                      <span class="input-group-btn">
                                                                          <button style="background-color:#5A55A3; color:#fff;" data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager{{$k}}{{$k}}{{$k}}{{$k}}" href="javascript:;" data-toggle="modal">
                                                                              <span class="fa fa-camera"></span>
                                                                          </button>
                                                                      </span>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                        </div> 
                                                        <div class="modal fade mymodal" id="fileManager{{$k}}{{$k}}{{$k}}{{$k}}">  
                                                            <div class="modal-dialog" style="width:65%;">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title">File Manager</h4>
                                                                </div>
                                                                <div class="modal-body" style="padding:0px; margin:0px;">
                                                                  <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'.$k.$k.$k.$k.'&relative_url=1&fldr=&rootFolder='.$user->client->client_number.'_'.$user->client->client_folder_time.'&multiple=0&create_folders=0') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                                                                </div>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                              </td>
                                          </tr>                                    
                                      @endfor
                                  </tbody>
                                  
                              </table>

                              @endif

                              <div class="form-group clearfix">
                                  <a href="javascript:void(0);" onclick="goBack()" class="form-wizard-next-btn float-left">Previous</a>
                                  <!-- <a href="javascript:void(0);" onclick="$('#st1').submit()" class="form-wizard-next-btn float-right">Next</a> -->
                                  <button type="submit" class="form-wizard-next-btn float-right">Next</button>
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
<div id="member_programs3" class="member_programs3" style="display: none;">
        <a href="javascript:void(0);" class="delete_member_program2" style="color: red;font-size: 18px;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
        <div class="panel-body11">
    <div class="form-group">
        {!! Form::label('invoices', 'Invoice') !!}
        <div class="input-group">
            {!! Form::text('invoices[]', null, array('class' => 'form-control myinput', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'invoice', 'placeholder'=>'Invoices', 'id' => 'invoices')) !!}
            <span class="input-group-btn">
                <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager80" href="javascript:;" data-toggle="modal">
                    <span class="glyphicon glyphicon-picture"></span>
                </button>
            </span>
        </div>
        <!-- (select invoices) -->
    </div>

</div>

    </div>   

    <div id="member_programs33" class="member_programs33" style="display: none;">
         <div class="modal fade mymodal" id="fileManager80">  
        <div class="modal-dialog" style="width:65%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">File Manager</h4>
            </div>
            <div class="modal-body" style="padding:0px; margin:0px;">
              <iframe width="100%" height="500" src="{{ URL::to('../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?type=2&amp;field_id=invoices&amp;relative_url=1&amp;fldr=') }}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
          </div>
      </div>
  </div>

<!--t2-->  


     </div>     
<!-- form wizard end -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
.errord {
  position: relative;
  animation: shake .1s linear;
  animation-iteration-count: 3;
  border: 1px solid red !important;
  outline: none;
}

@keyframes shake {
  0% {
    left: -5px;
  }
  100% {
    right: -5px;
  }
}
</style>
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="{{ URL::to('/') }}/js/jquery.min.js"></script> 
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">


// var k2=600;
// $('.add_member_programs2').click(function(){

//     var $klon = $('.member_programs3').clone();

//     $($klon).find('div.mymodal').attr('id','fileManager'+k2);
//     $($klon).find('button.btn').attr('data-target','#fileManager'+k2);
//     $($klon).find('input.myinput').attr('id','invoices'+k2);
//     $($klon).find('textarea.ttt').attr('class','textarea22');
    
//     ////
//     var $klon2 = $('.member_programs33').clone();
//     $($klon2).find('div.mymodal').attr('id','fileManager'+k2);
//     $($klon2).find('iframe').attr('src','../../../gst/assets/vendors/responsive-filemanager/filemanager/dialog.php?allop=png&type=1&field_id=invoices'+k2+'&relative_url=1&fldr=&rootFolder=user1');        
//     k2++;

//     $('.member_program_section2').append($klon2.html());
//     $('.member_program_section2').append('<div class="partition-blue" style="padding:10px;padding-top:15px;padding-bottom:5px;margin-bottom: 10px;">'+$klon.html()+'<div>');

//     //initMCEall('textarea22');

//     $('.delete_member_program2').click(function(){
//         $(this).parent().remove();
//     });
// });
// $('.delete_member_program2').click(function(){
//     $(this).parent().remove();
// });
</script>  
<!-- <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script> -->
<script type="text/javascript">

$('.single_expense_date_vals').datepicker({
    autoclose: true
});
$('.multiple_expense_date_vals').datepicker({
    autoclose: true
});


function goBack() {
  window.history.back();
}

function period_type(st){
  if(st == 1){
    $('#table2').show();
    $('#table1').hide();
    add_all_input_single_expense();
    add_all_input_single_expense_3();
  }else if(st == 2){
    $('#table1').show();
    $('#table2').hide();
    add_all_input_multiple_expense();
    add_all_input_multiple_expense_3();
  }
}

// function add_all_input_single_expense(st){
//   // single_income
//   // $('#single_total').val();
//   var tot=0;var g;
//   $('.single_expense').each(function(index) {
//         if($(this).val() != ''){
//           // alert(parseFloat($(this).val()));
//           g = parseFloat($(this).val());
//           tot = parseFloat(tot) + parseFloat(g);
//         }
//     });
//   $('#single_expense_total').val(tot);
// }

function add_all_input_single_expense_3(st){

  console.log('SINGLE/(3 MONTHS) EXPENSE METHOD CALLED ____3');
  $('.multipleinvoicecl').removeAttr('required');
  $('.multipleinvoicecl').removeClass('errord');  

  $('.singleinvoicecl').attr('required', 'required');
  $('.singleinvoicecl').addClass('errord');

  $('.singleinvoicecl').each(function(index) {
        if($(this).val() != ''){
          $('.singleinvoicecl').eq(index).removeAttr('required');
          $('.singleinvoicecl').eq(index).removeClass('errord');       
        }
    });
}

function add_all_input_multiple_expense_3(st){

  console.log('MULTIPLE/(SINGLE MONTH) EXPENSE METHOD CALLED _____3');
  $('.singleinvoicecl').removeAttr('required');
  $('.singleinvoicecl').removeClass('errord');
  
  $('.multipleinvoicecl').attr('required', 'required');
  $('.multipleinvoicecl').addClass('errord');

  $('.multipleinvoicecl').each(function(index) {
        if($(this).val() != ''){
          $('.multipleinvoicecl').eq(index).removeAttr('required');
          $('.multipleinvoicecl').eq(index).removeClass('errord');
        }
    });

}

function add_all_input_single_expense(st){
  // single_income
  // $('#single_total').val();
  console.log('SINGLE/(3 MONTHS) EXPENSE METHOD CALLED');
  $('.multiple_expense').removeAttr('required');
  // $('.multiple_expense_alter').removeAttr('required');
  $('.multiple_expense').removeClass('errord');
  // $('.multiple_expense_alter').removeClass('errord');

  $('.single_expense').attr('required','required');
  // $('.single_expense_alter').attr('required','required');
  $('.single_expense').addClass('errord');
  // $('.single_expense_alter').addClass('errord');
  $('.single_expense_date_vals').attr('required','required');
  $('.single_expense_date_vals').addClass('errord');
  $('.multiple_expense_date_vals').removeAttr('required','required');
  $('.multiple_expense_date_vals').removeClass('errord');

  $('.single_expense_makemodel_vals').attr('required','required');
  $('.single_expense_makemodel_vals').addClass('errord');
  $('.single_expense_business_percent_vals').attr('required','required');
  $('.single_expense_business_percent_vals').addClass('errord');

  $('.multiple_expense_makemodel_vals').removeAttr('required','required');
  $('.multiple_expense_makemodel_vals').removeClass('errord');
  $('.multiple_expense_business_percent_vals').removeAttr('required','required');
  $('.multiple_expense_business_percent_vals').removeClass('errord');

  $('.novalidation').removeClass('errord');
  $('.novalidation').removeAttr('required','required');



  var tot=0;var g;var o_val = 0;
  $('.single_expense_date_vals').each(function(index) {
        if($(this).val() != ''){
          $('.single_expense_date_vals').eq(index).removeClass('errord');
          $('.single_expense_date_vals').eq(index).removeAttr('required');
        
        }else{
          $('.single_expense_date_vals').eq(index).addClass('errord');
          $('.single_expense_date_vals').eq(index).attr('required');
        }
    });
  $('.single_expense_makemodel_vals').each(function(index) {
        if($(this).val() != ''){
          $('.single_expense_makemodel_vals').eq(index).removeClass('errord');
          $('.single_expense_makemodel_vals').eq(index).removeAttr('required');
        
        }else{
          $('.single_expense_makemodel_vals').eq(index).addClass('errord');
          $('.single_expense_makemodel_vals').eq(index).attr('required');
        }
    });
  $('.single_expense_business_percent_vals').each(function(index) {
        if($(this).val() != ''){
          $('.single_expense_business_percent_vals').eq(index).removeClass('errord');
          $('.single_expense_business_percent_vals').eq(index).removeAttr('required');
        
        }else{
          $('.single_expense_business_percent_vals').eq(index).addClass('errord');
          $('.single_expense_business_percent_vals').eq(index).attr('required');
        }
    });

  $('.single_expense').each(function(index) {
        if($(this).val() != ''){
        // alert('in1');
        // if($('.single_income_alter').eq(index).val() != ''){o_val = $('.single_income_alter').eq(index).val();}
        // else{o_val = $(this).val();}
          // alert(parseFloat($(this).val()));
          o_val = $(this).val();
          g = parseFloat(o_val);
          tot = parseFloat(tot) + parseFloat(g);
          $('.single_expense').eq(index).removeClass('errord');
          $('.single_expense').eq(index).removeAttr('required');
        
        }else{
          // alert('in3');
          $('.single_expense').eq(index).addClass('errord');
          $('.single_expense').eq(index).attr('required');

          g = 0;
          tot = parseFloat(tot) + parseFloat(g);
        }
    });
  $('#single_expense_total').val(tot);
  // calculation of gst
  var r=0; var total_gst = 0; after_gst_total = 0;
  $('.single_expense_percent').each(function(index) { ////// single_expense_business_percent_vals
    prcent_val   = $(this).val();
    inputted_val = $('.single_expense').eq(index).val();
    if(prcent_val != 0){
      console.log(prcent_val+'------'+inputted_val+'---------'+index+'----'+parseFloat(inputted_val/prcent_val));
      // console.log('poppopoop');
      // console.log((index)+'--'+$('.single_expense_business_percent_vals').eq(index).val());
      if($('.single_expense_business_percent_vals').eq(index).val() != ''){
        // alert('o');
        // console.log('no log');
        bpercentage = $('.single_expense_business_percent_vals').eq(index).val();

        inputted_val = parseFloat(inputted_val/bpercentage);
      }



      total_gst += parseFloat(inputted_val/prcent_val);

    }else{
      console.log(prcent_val+'------'+inputted_val+'---------'+index+'----');
      total_gst += 0;
    }
    r++;

    });
  after_gst_total = parseFloat(tot - total_gst);
  console.log('total gst = >>> '+total_gst+'--after total gst = >>> '+after_gst_total);
  
  $('#single_expense_gst_paid').val(total_gst);
}


// function add_all_input_multiple_expense(st){
//   // single_income
//   // $('#single_total').val();
//   var tot=0;var g;
//   $('.multiple_expense').each(function(index) {
//         if($(this).val() != ''){
//           // alert(parseFloat($(this).val()));
//           g = parseFloat($(this).val());
//           tot = parseFloat(tot) + parseFloat(g);
//         }
//     });
//   $('#multiple_expense_total').val(tot);
// }


function add_all_input_multiple_expense(st){
  // single_income
  // $('#single_total').val();
  console.log('MULTIPLE/(SINGLE MONTH) EXPENSE METHOD CALLED');
  $('.single_expense').removeAttr('required');
  // $('.single_expense_alter').removeAttr('required');
  $('.single_expense').removeClass('errord');
  // $('.single_expense_alter').removeClass('errord');

  $('.multiple_expense').attr('required', 'required');
  // $('.multiple_expense_alter').attr('required', 'required');
  $('.multiple_expense').addClass('errord');
  // $('.multiple_expense_alter').addClass('errord');
  $('.multiple_expense_date_vals').attr('required','required');
  $('.multiple_expense_date_vals').addClass('errord');
  $('.single_expense_date_vals').removeAttr('required','required');
  $('.single_expense_date_vals').removeClass('errord');



  $('.multiple_expense_makemodel_vals').attr('required','required');
  $('.multiple_expense_makemodel_vals').addClass('errord');
  $('.multiple_expense_business_percent_vals').attr('required','required');
  $('.multiple_expense_business_percent_vals').addClass('errord');

  $('.single_expense_makemodel_vals').removeAttr('required','required');
  $('.single_expense_makemodel_vals').removeClass('errord');
  $('.single_expense_business_percent_vals').removeAttr('required','required');
  $('.single_expense_business_percent_vals').removeClass('errord');


  $('.novalidation').removeClass('errord');
  $('.novalidation').removeAttr('required','required');
  

  var tot=0;var g;var o_val = 0;
    $('.multiple_expense_date_vals').each(function(index) {
        if($(this).val() != ''){
          $('.multiple_expense_date_vals').eq(index).removeClass('errord');
          $('.multiple_expense_date_vals').eq(index).removeAttr('required');
        
        }else{
          $('.multiple_expense_date_vals').eq(index).addClass('errord');
          $('.multiple_expense_date_vals').eq(index).attr('required');
        }
    });
    $('.multiple_expense_makemodel_vals').each(function(index) {
        if($(this).val() != ''){
          $('.multiple_expense_makemodel_vals').eq(index).removeClass('errord');
          $('.multiple_expense_makemodel_vals').eq(index).removeAttr('required');
        
        }else{
          $('.multiple_expense_makemodel_vals').eq(index).addClass('errord');
          $('.multiple_expense_makemodel_vals').eq(index).attr('required');
        }
    });
    $('.multiple_expense_business_percent_vals').each(function(index) {
        if($(this).val() != ''){
          $('.multiple_expense_business_percent_vals').eq(index).removeClass('errord');
          $('.multiple_expense_business_percent_vals').eq(index).removeAttr('required');
        
        }else{
          $('.multiple_expense_business_percent_vals').eq(index).addClass('errord');
          $('.multiple_expense_business_percent_vals').eq(index).attr('required');
        }
    });

  $('.multiple_expense').each(function(index) {
        if($(this).val() != ''){
          // alert(parseFloat($(this).val()));
          o_val = $(this).val();
          g = parseFloat(o_val);
          tot = parseFloat(tot) + parseFloat(g);

          $('.multiple_expense').eq(index).removeClass('errord');
          $('.multiple_expense').eq(index).removeAttr('required');

        }else{
          // alert('in3');
          $('.multiple_expense').eq(index).addClass('errord');
          $('.multiple_expense').eq(index).attr('required');

          g = 0;
          tot = parseFloat(tot) + parseFloat(g);
        }
    });
  $('#multiple_expense_total').val(tot);
  // calculation of gst
  var r=0; var total_gst = 0; after_gst_total = 0;
  $('.multiple_expense_percent').each(function(index) {
    prcent_val   = $(this).val();
    inputted_val = $('.multiple_expense').eq(index).val();
    if(prcent_val != 0){
      console.log(prcent_val+'------'+inputted_val+'---------'+index+'----'+parseFloat(inputted_val/prcent_val));
      if($('.multiple_expense_business_percent_vals').eq(index).val() != ''){
        // alert('o');
        // console.log('no log');
        bpercentage = $('.multiple_expense_business_percent_vals').eq(index).val();

        inputted_val = parseFloat(inputted_val/bpercentage);
      }
      
      total_gst += parseFloat(inputted_val/prcent_val);

    }else{
      console.log(prcent_val+'------'+inputted_val+'---------'+index+'----');
      total_gst += 0;
    }
    r++;

    });
  after_gst_total = parseFloat(tot - total_gst);
  console.log('total gst = >>> '+total_gst+'--after total gst = >>> '+after_gst_total);
  
  $('#multiple_expense_gst_paid').val(total_gst);
}


jQuery(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();

  @if(null !== (request()->session()->get('single_expense_vals')[0]))
    add_all_input_single_expense();
  @endif

  @if(null !== (request()->session()->get('multiple_expense_vals')[0]))
    add_all_input_multiple_expense();
  @endif
  
  
  $.ajax({
    url: "{{ URL::to('/') }}/get_period_val/2", // 1 for income
    context: document.body
  }).done(function(d) {
    // $( this ).addClass( "done" );
    // alert(d);
    period_type(d);
  });
      // click on next button
    jQuery('.form-wizard-next-btn').click(function(e) {
        //   e.preventDefault();
        // var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        // var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        // var next = jQuery(this);
        // var nextWizardStep = false;
        // parentFieldset.find('.wizard-required').each(function(){
        //     var thisValue = jQuery(this).val();

        //     if( thisValue == "") {
            
        //         jQuery(this).siblings(".wizard-form-error").slideDown();
        //         nextWizardStep = false;
        //     }
        //     else {
        //     nextWizardStep=true;
        //         jQuery(this).siblings(".wizard-form-error").slideUp();
        //     }
        // });
        // if(nextWizardStep === true){
        //   location.href=$(this).attr('href');
        // }
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