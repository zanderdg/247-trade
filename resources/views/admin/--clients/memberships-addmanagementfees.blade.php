@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add Management Fees
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
        <h1>Add Management Fees</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Members</li>
            <li class="active">Add Management Fees</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="members-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add Management Fees
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <!-- errors -->
                        <div class="has-error">
                            {!! $errors->first('installment_plan', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('card_fname', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('card_lname', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('card_number', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('card_cvv', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('expiration_month', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('expiration_year', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('golf_course_id', '<span class="help-block">:message</span>') !!}
                        </div>
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissable margin5">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Error:</strong> {{ $message }}
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissable margin5">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Success:</strong> {{ $message }}
                        </div>
                        @endif



                        <!--main content-->
                        <div class="col-md-12">

                        

                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                            <form class="form-wizard form-horizontal" action="" method="POST" id="wizard-validation111" enctype="multipart/form-data">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <!-- first tab -->

                                


                                <h1>Annual Management Fees</h1>

                                <section>

                                
                                <table class="table table-striped">
                                  <tbody>
                                    <tr>
                                      <td width="30%">Management Fees: </td>
                                      <td>${!! $membership_price !!}</td>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>Tax:</td>
                                      <td>{!! $tax_rate !!} %</td>
                                      
                                    </tr>
                                     <tr>
                                      <td>Subtotal:</td>
                                      <td>${!! $total_price !!}</td>
                                    </tr>
                                  </tbody>
                                </table>

                                    @if(isset($MemberManagementFees2->join_date))
                                            <h3 class="panel-title" style="margin-bottom: 10px;">Annual Management Fees Member's Detail</h3>

                                            @if($user->members->is_free == 0)

                                            <table class="table table-striped">
                                             
                                              <tbody>
                                                <tr>
                                                  <td width="30%">Join Date: </td>
                                                  <td>{!! date('M, d, Y', strtotime($MemberManagementFees2->join_date)) !!}</td>
                                                  
                                                </tr>
                                                
                                                <tr>
                                                  <td>Expiry Date:</td>
                                                  <td>{!! date('M, d, Y', strtotime($MemberManagementFees2->expiry_date)) !!}</td>
                                                  
                                                </tr>
                                                 <tr>
                                                  <td>Management Fees Paid:</td>
                                                  <td>${!! $MemberManagementFees2->management_fees !!}</td>
                                                </tr>
                                                 <tr>
                                                  <td>Transaction ID:</td>
                                                  <td>{!! $MemberManagementFees2->transaction_id !!}</td>
                                                </tr>
                                                 
                                              </tbody>
                                            </table>

                                            @else
                                            <table class="table table-striped">
                                              <tbody>
                                                <tr>
                                                  <td width="30%">Management Fees: </td>
                                                  <td>FREE</td>
                                                </tr>   
                                              </tbody>
                                            </table>


                                            @endif
                                            
                                            @else
                                            <h3 class="panel-title" style="margin-bottom: 10px;">Annual Management Fees Member's Detail</h3>
                                            <p>Not Paid</p>

                                            @endif

                                </section>


                                <h1>Make Free Management Fees</h1>
                                

                                <section>
                                    <div class="form-group">
                                        <label for="state" class="col-sm-2 control-label">Make Free</label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" class=" edit_profile2" style="height: 30px;    width: 15px;" id="is_free" value="1" @if($user->members->is_free==1) checked="checked" @endif name="is_free"/>
                                        </div>
                                    </div>
                                </section>

                                

                               

                                

                                <h1>Card Info</h1>
                                <section>
                                    <div class="form-group">
                                        <label for="state" class="col-sm-2 control-label">Card Holder Name</label>
                                        <div class="col-sm-10">
                                            <input id="card_name" name="card_fname" type="text" placeholder="Card Holder Name" class="form-control  required" value="{!! Input::old('card_fname') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="city" class="col-sm-2 control-label">Credit Card Number</label>
                                        <div class="col-sm-10">
                                            <input id="card_number" name="card_number" type="text" placeholder="Credit Card Number" class="form-control required" value="{!! Input::old('card_number') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="col-sm-2 control-label">Expiry Date</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('expiration_month', $months,'',array('class' => 'form-control', 'id'=>'expiration_month', 'style'=>'width:48%; float: left; margin-right: 20px;')) !!}
                                            {!! Form::select('expiration_year', $years,'',array('class' => 'form-control', 'id'=>'expiration_year', 'style'=>'width:48%;')) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="postal" class="col-sm-2 control-label">Card CVV</label>
                                        <div class="col-sm-10">
                                            <input id="card_cvv" name="card_cvv" type="text" placeholder="CVV" class="form-control required" value="{!! Input::old('card_cvv') !!}" />
                                        </div>
                                    </div>

                                    <div class="credit-submit col-xs-12 col-sm-12 col-md-12">
                                        <!-- <input name="proceed-checkout" class="green-submit" type="submit"> -->
                                        <button type="submit" class="btn btn-success" style="float: right;">Checkout</button>
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
    $(document).ready(function() {

        $('#golf_course_id').change(function(){
            var trate = $('#taxrate').text();
            var price = $('#golf_course_id option:selected').text().match(/\d+/); // 123456
            var tots = (price * trate)/100;
            var total = parseFloat(tots) + parseFloat(price);
            $('#substotal').text('$'+total);

            var dividesix       = Math.round((total/6)*100)/100;
            var dividetwelve    = Math.round((total/12)*100)/100;

            $('#installmentplan option:eq(1)').text('6 Months ('+dividesix+' per month)');
            $('#installmentplan option:eq(2)').text('12 Months ('+dividetwelve+' per month)');
            //$("#target").val($("#target option:first").val());

            //alert('asa');
        });


        $(".chkradio").change(function(){
        if($(this).val() == 'male'){
            $('.female-size').hide();
            $('.male-size').show();
        }else{
            $('.male-size').hide();
            $('.female-size').show();
        }
    });
    $('.chkcheckbox').change(function() {
        if(this.checked) {
            $('#input_address').val($('.address-det').text());
            $('#input_zipcode').val($('.zip-det').text());
            cText = $('.country-det').text();
            $("#mcountry option:contains(" + cText + ")").attr('selected', 'selected');
            sText = $('.state-det').text();
            $("#mstates option:contains(" + sText + ")").attr('selected', 'selected');
            citText = $('.city-det').text();
            $("#mcities option:contains(" + citText + ")").attr('selected', 'selected');
        }
        else{
            $('#input_address').val('');
            $('#input_zipcode').val('');
        }    
    });
    $(".chkradio2").change(function(){
        if($(this).val() == 1){
            $('.ins-plan').hide();
            //$('.male-size').show();
        }else{
            //$('.male-size').hide();
            $('.ins-plan').show();
        }
    });    
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