@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
Reporting
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

    <!--end of page level css-->
@stop
{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>
        Reporting
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Reporting</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Select Reporting
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => URL::to('admin/reporting'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=> true)) !!}

                        <div class="form-group {{ $errors->first('golf_course_id', 'has-error') }}">
                            <label for="golf_course_id" class="col-sm-3 control-label">
                                Select Golf Course
                            </label>
                            <div class="col-sm-5">
                                {!! Form::select('golf_course_id', $golf_courses, $golf_course_id, array('class' => 'form-control select2', 'placeholder'=>'Select Golf Course'))!!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('golf_course_id', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->first('date_from', 'has-error') }}">
                            <label for="date_from" class="col-sm-3 control-label">
                                Join Date From
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('date_from', $date_from, array('class' => 'form-control showcal', 'placeholder'=>'Date From', 'readonly')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('date_from', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('date_to', 'has-error') }}">
                            <label for="date_to" class="col-sm-3 control-label">
                                Join Date To
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('date_to', $date_to, array('class' => 'form-control showcal', 'placeholder'=>'Date To', 'readonly')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('date_to', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('report_type', 'has-error') }}">
                            <label for="report_type" class="col-sm-3 control-label">
                                Report Type
                            </label>
                            <div class="col-sm-5">
                                <select class="form-control" title="Select Report Type" name="report_type">
                                    <option value="">Select</option>
                                    <option value="membership_report" @if($report_type === 'membership_report') selected="selected" @endif >Membership Report</option>
                                    <option value="revenue_report" @if($report_type === 'revenue_report') selected="selected" @endif >Revenue Report</option>
                                    <option value="new_user_report" @if($report_type === 'new_user_report') selected="selected" @endif >New User Report</option>
                                    <option value="inactive_user_report" @if($report_type === 'inactive_user_report') selected="selected" @endif >Inactive User Report</option>
                                    <option value="returning_user_report" @if($report_type === 'returning_user_report') selected="selected" @endif >Returning User Report</option>
                                    <option value="offer_report_seller" @if($report_type === 'offer_report_seller') selected="selected" @endif >Teeshare Offers Report (Seller)</option>
                                    <option value="offer_report_buyer" @if($report_type === 'offer_report_buyer') selected="selected" @endif >Teeshare Offers Report (Buyer)</option>
                                    <option value="payment_status_report" @if($report_type === 'payment_status_report') selected="selected" @endif >Payment Status Report</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('report_type', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>
                        <div class="clear"></div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4">
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                                <button type="submit" name="show" value="show" class="btn btn-success">
                                    Show
                                </button>
                                <button type="submit" name="export" value="export" class="btn btn-success">
                                    Export
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <br />
                @if(isset($allfilteredcourses) && !empty($allfilteredcourses))
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Course NAme</th>
                            <th>Membership #</th>
                            <th>User ID</th>
                            <th>Barcode #</th>
                            <th>Zip Code</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Join Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($allfilteredcourses as $member)
                        <tr>
                            <td>{!! $member->last_name !!}</td>
                            <td>{!! $member->first_name !!}</td>
                            <td>{!! $member->coursename !!}</td>
                            <td>MM-{!! $member->mm_id !!}</td>
                            <td>{!! $member->id !!}</td>
                            <td>{!! $member->bar_code !!}</td>
                            <td>{!! $member->zipcode !!}</td>
                            <td>{!! $member->phone !!}</td>
                            <td>{!! $member->email !!}</td>
                            <td>{!! $member->join_date !!}</td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
            @elseif(isset($allfilteredcourses2) && !empty($allfilteredcourses2))
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Course Name</th>
                            <th>Membership #</th>
                            <th>User ID</th>
                            <th>Barcode #</th>
                            <th>Zip Code</th>
                            <th>Payment Amount</th>
                            <th>Purchase Date</th>
                            <th>Transaction Type</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($allfilteredcourses2 as $member)
                        <tr>
                            <td>{!! $member->last_name !!}</td>
                            <td>{!! $member->first_name !!}</td>
                            <td>{!! $member->coursename !!}</td>
                            <td>MM-{!! $member->mm_id !!}</td>
                            <td>{!! $member->id !!}</td>
                            <td>{!! $member->bar_code !!}</td>
                            <td>{!! $member->zipcode !!}</td>
                            <td>${!! $member->actual_total_amount !!}</td>
                            <td>{!! $member->join_date !!}</td>
                            <td>{!! $member->payment_type !!}</td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
            @elseif(isset($allfilteredcourses3) && !empty($allfilteredcourses3))
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">                            
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>User ID</th>
                            <th>Zip Code</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($allfilteredcourses3 as $member)
                        @if($member->new_member == 1)
                        <tr>
                            <td>{!! $member->last_name !!}</td>
                            <td>{!! $member->first_name !!}</td>
                            <td>{!! $member->email !!}</td>
                            <td>{!! $member->id !!}</td>
                            <td>{!! $member->zipcode !!}</td>                            
                        </tr>
                        @endif
                    @endforeach                        
                    </tbody>
                </table>
            </div>
            @elseif(isset($allfilteredcourses6) && !empty($allfilteredcourses6))
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">                            
                            <th>Sellers Last Name</th>
                            <th>Sellers First Name</th>
                            <th>Course</th>
                            <th>Membership #</th>
                            <th>User ID</th>
                            <th>Barcode</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($allfilteredcourses6 as $member)
                        @if($member->c_id!='')
                        <tr>
                            <td>{!! $member->last_name !!}</td>
                            <td>{!! $member->first_name !!}</td>
                            <td>{!! $member->c_id !!}</td>
                            <td>MM-{!! $member->mm_id !!}</td>
                            <td>{!! $member->id !!}</td>
                            <td>{!! $member->bar_code !!}</td>                            
                        </tr>
                        @endif
                    @endforeach                        
                    </tbody>
                </table>
            </div>
            @elseif(isset($allfilteredcourses7) && !empty($allfilteredcourses7))
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Buyers Last Name</th>
                            <th>Buyers First Name</th>
                            <th>Amount of Purchase</th>
                            <th>User ID</th>
                            <th>Zip Code</th> 
                            <th>Transaction Date</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($allfilteredcourses7 as $member)
                        <tr>
                            <td>{!! $member->last_name !!}</td>
                            <td>{!! $member->first_name !!}</td>
                            <td>${!! $member->actual_total_amount !!}</td>                            
                            <td>{!! $member->id !!}</td>                            
                            <td>{!! $member->zipcode !!}</td>
                            <td>{!! date('M d, Y', strtotime($member->created_at)) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @elseif(isset($allfilteredcourses8) && !empty($allfilteredcourses8))
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Payment Type</th>
                            <th>Installment Length</th>
                            <th>Received Amount</th> 
                            <th>Outstanding Amount</th> 
                            <th>Card Number</th> 
                            <th>Contact Number</th> 
                            <th>Contact Email</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($allfilteredcourses8 as $member)
                        <tr>
                            <td>{!! $member->last_name !!}</td>
                            <td>{!! $member->first_name !!}</td>
                            <td>{!! $member->payment_type !!}</td>
                            <td>{!! $member->installment_plan !!}</td>                            
                            <td>${!! $member->received_amount !!}</td>
                            <td>${!! $member->outstanding_amount !!}</td>
                            <td>{!! $member->card_number !!}</td>
                            <td>{!! $member->phone !!}</td>
                            <td>{!! $member->email !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            </div>
        </div>
    </div>
    <!-- row-->
<div id="member_programs3" class="member_programs3" style="display: none;">
        <a href="javascript:void(0);" class="delete_member_program3" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
        <div class="panel-body">    
            <div class="form-group">
                {!! Form::label('male_shirt_sizes', 'Male Shirt Sizes') !!}
                {!! Form::text('male_shirt_sizes[]', null, array('class' => 'form-control', 'placeholder'=>'Male Shirt Sizes')) !!}
            </div>    
        </div>
</div> 
<div id="member_programs4" class="member_programs4" style="display: none;">
        <a href="javascript:void(0);" class="delete_member_program4" style="color: red;font-size: 18px;position: absolute;top: -12px;right: -12px;"><i class="fa fa-times-circle"></i></a>
        <div class="panel-body">    
            <div class="form-group">
                {!! Form::label('female_shirt_sizes', 'Female Shirt Sizes') !!}
                {!! Form::text('female_shirt_sizes[]', null, array('class' => 'form-control', 'placeholder'=>'Female Shirt Sizes')) !!}
            </div>    
        </div>
</div>     
</section>
@include('admin.layouts.modal_filemanager', $image_fields)
@stop

@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}"  type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        /////////////////////////calendar
        //Date picker
        
        // all date cals
        $('.showcal').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            format: 'YYYY-MM-DD'
        });
    });
    
    </script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/extensions/bootstrap/dataTables.bootstrap.js') }}"></script>

<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
@stop