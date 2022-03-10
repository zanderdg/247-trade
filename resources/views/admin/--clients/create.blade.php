@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add Client
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link rel="stylesheet" href="{{ asset('assets/vendors/wizard/jquery-steps/css/wizard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/wizard/jquery-steps/css/jquery.steps.css') }}">
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Add New Client</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Clients</li>
            <li class="active">Add New Client</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="members-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add New Client
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <!-- errors -->
                        <div class="has-error">
                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('group', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('pic', '<span class="help-block">:message</span>') !!}
                        </div>

                        <!--main content-->
                        <div class="col-md-12">

                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                            <form class="form-wizard form-horizontal" action="{{ route('create/client') }}" method="POST" id="wizard-validation" enctype="multipart/form-data">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <!-- first tab -->
                                <h1>Client Profile</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-2 control-label">First Name *</label>
                                        <div class="col-sm-10">
                                            <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control required" value="{!! Input::old('first_name') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name" class="col-sm-2 control-label">Last Name *</label>
                                        <div class="col-sm-10">
                                            <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control required" value="{!! Input::old('last_name') !!}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="family_name" class="col-sm-2 control-label">Family Name *</label>
                                        <div class="col-sm-10">
                                            <input id="family_name" name="family_name" type="text" placeholder="Family Name" class="form-control required" value="{!! Input::old('family_name') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-Mail" type="text" class="form-control required email" value="{!! Input::old('email') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="col-sm-2 control-label">Phone *</label>
                                        <div class="col-sm-10">
                                            <input id="phone" name="phone" placeholder="Phone #" type="text" class="form-control required" value="{!! Input::old('phone') !!}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-2 control-label">Address *</label>
                                        <div class="col-sm-10">
                                            <input id="address" name="address" placeholder="Address #" type="text" class="form-control required" value="{!! Input::old('address') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Password *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Password" class="form-control required" value="{!! Input::old('password') !!}" />
                                            <br>
                                            (password must have minimum 8 characters and should contain one upper case letter.)
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirm" class="col-sm-2 control-label">Confirm Password *</label>
                                        <div class="col-sm-10">
                                            <input id="password_confirm" name="password_confirm" type="password" placeholder="Confirm Password " class="form-control required" value="{!! Input::old('password_confirm') !!}" />
                                        </div>
                                    </div>

                                    

                                    <p>(*) Mandatory</p>

                                </section>


                                <!-- fourth tab -->
                                <h1>Client Activation</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="dob" class="col-sm-2 control-label">DOB *</label>
                                        <div class="col-sm-10">
                                            <input id="dob" name="dob" placeholder="DOB" type="text" class="showcal form-control required" value="{!! Input::old('dob') !!}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tfn_number" class="col-sm-2 control-label">TFN Number *</label>
                                        <div class="col-sm-10">
                                            <input id="tfn_number" name="tfn_number" placeholder="TFN Number" type="text" class="form-control required" value="{!! Input::old('tfn_number') !!}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="abn_number" class="col-sm-2 control-label">ABN Number *</label>
                                        <div class="col-sm-10">
                                            <input id="abn_number" name="abn_number" placeholder="ABN Number" type="text" class="form-control required" value="{!! Input::old('abn_number') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" title="Select Gender..." name="gender">
                                                <option value="">Select</option>
                                                <option value="male" @if(Input::old('gender') === 'male') selected="selected" @endif >MALE</option>
                                                <option value="female" @if(Input::old('gender') === 'female') selected="selected" @endif >FEMALE</option>
                                                <!-- <option value="other" @if(Input::old('gender') === 'other') selected="selected" @endif >OTHER</option> -->

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="activate" class="col-sm-2 control-label"> Activate Client</label>
                                        <div class="col-sm-10">
                                            <input id="activate" name="activate" type="checkbox" class="pos-rel p-l-30" value="1" @if(Input::old('activate')) checked="checked" @endif  >
                                        </div>
                                        <span>If member is not activated, mail will be sent to user with activation link</span>
                                    </div>


                                </section>

                            </form>
                            <!-- END FORM WIZARD WITH VALIDATION -->
                        </div>
                        <!--main content end-->
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
  
    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form_wizard.js') }}"></script>

    <script src="{{ asset('assets/vendors/daterangepicker/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}"  type="text/javascript"></script>

    <script>

        $("#wizard-validation").validate({
          rules: {
            //input_password: "required",
            password: {
                                        required: true,
                                        pwcheck: true,
                                        minlength: 8
                                    },
            password_confirm: {
              equalTo: "#password"
            },
            card_number : {
                        number: true,
                        minlength: 13,
                        maxlength:16
            }
          },messages: {
                       
                        password: {
                            pwcheck: "Password must contain one capital letter",
                        },
                        password_confirm: {
                            equalTo: "Confirm password should match the password",
                        }
                    }
        });
        $.validator.addMethod("pwcheck",
            function(value, element) {
                return /^(?=.*[A-Z]).+$/.test(value);
        });

    $(document).ready(function() {
    

/////////////////////////states
        $("#mcountry").change(function(){
            var selectedCountry = $("#mcountry option:selected").val();
            //alert(selectedCountry);
            $('#mstates').html("");
            $('#mcities').html("");
            var option=$('<option />');option.attr('value','').text('Select City');$('#mcities').append(option);
            //$('#mstates').find("option:eq(0)").html("Select State");
            var option=$('<option />');option.attr('value','').text('Please Wait');$('#mstates').append(option);
        $.ajax({
            type: "GET",
            url: "/get-states/"+selectedCountry,
            //data: { country : selectedCountry } 
        }).done(function(data){
            //alert(data);
            $('#mstates').find("option:eq(0)").html("Select State");
            //$('#mstates').html("Select State");
            $.each(data,function(key,val){
                var option=$('<option />');option.attr('value',key).text(val);$('#mstates').append(option);
                //alert(key);
            });
            
        });
        
    });
        /////////////////////////states
        /////////////////////////cities
        $("#mstates").change(function(){
            var selectedState = $("#mstates option:selected").val();
            //alert(selectedCountry);
            $('#mcities').html("");
            //$('#mstates').find("option:eq(0)").html("Select State");
            var option=$('<option />');option.attr('value','').text('Please Wait');$('#mcities').append(option);
        $.ajax({
            type: "GET",
            url: "/get-cities/"+selectedState,
            //data: { country : selectedCountry } 
        }).done(function(data){
            
            $('#mcities').find("option:eq(0)").html("Select City");
            //$('#mstates').html("Select State");
            $.each(data,function(key,val){
                var option=$('<option />');option.attr('value',key).text(val);$('#mcities').append(option);
                //alert(key);
            });
            
        });
        
    });
        /////////////////////////cities


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
@stop