@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add Member
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
        <h1>Add New Membership</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Members</li>
            <li class="active">Add New Membership</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="members-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Add New Membership
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
                            {!! $errors->first('check_number', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('check_amount', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('bank_name', '<span class="help-block">:message</span>') !!}
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

                                <!-- <h1>Teeshare Membership Price</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-2 control-label">Teeshare Membership Price</label>
                                        <div class="col-sm-10">
                                            ${!!$membership_price!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-2 control-label">Subtotal</label>
                                        <div class="col-sm-10">
                                            ${!!$membership_price!!}
                                        </div>
                                    </div>
                                </section>     -->


                                <h1>Contact Information</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-2 control-label">First Name</label>
                                        <div class="col-sm-10">
                                            {!! $user->first_name !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                                        <div class="col-sm-10">
                                            {!! $user->last_name !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            {!! $user->email !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="col-sm-2 control-label">Phone</label>
                                        <div class="col-sm-10">
                                            {!! $user->members->phone !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10 address-det ">{!! $user->members->address !!}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-10 city-det">{!! $user->members->city !!}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Zipcode</label>
                                        <div class="col-sm-10 zip-det">{!! $user->members->zipcode !!}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-10 state-det">{!! $user->members->state22 !!}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-10 country-det">{!! $user->members->country22 !!}</div>
                                    </div>                                

                                </section>

                                <!-- second tab -->
                                <h1>Course & Rates</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Select Course</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('golf_course_id', $gcourses, Input::old('golf_course_id'), array('id'=>'golf_course_id', 'class' => 'form-control select2', 'placeholder'=>'Select Golf Course'))!!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax" class="col-sm-2 control-label">Tax</label>
                                        <div class="col-sm-10">
                                            <span id="taxrate">{!!$tax_rate!!}</span> %
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="substotal" class="col-sm-2 control-label">Sub Total</label>
                                        <div class="col-sm-10">
                                            <span id="substotal"></span>
                                        </div>
                                    </div>
                                </section>    
                                <!-- second tab -->
                                <h1>Required Information For Welcome Package</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="dob" class="col-sm-2 control-label">Gender</label>
                                        <div class="col-sm-10">
                                            <input type="radio" name="gender" value="male" class="chkradio" @if(Input::old('gender')=='male') checked @else @endif @if(null ===(Input::old('gender'))) checked @endif> Male
                                            <input type="radio" name="gender" value="female" class="chkradio" @if(Input::old('gender')=='female') checked @else @endif> Female
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pic" class="col-sm-2 control-label">Shirt Size</label>
                                        <div class="col-sm-10 shrt-size male-size" @if(Input::old('gender')=='female')  style="display: none;" @else   @endif >
                                            <select class="form-control" name="male_size" id="expiry-month">
                                              @foreach ($male_shirt_sizesdata as $male_shirt_sizesdatasingle)                 
                                                    <option value="{!!$male_shirt_sizesdatasingle->male_shirt_sizes!!}" @if(Input::old('male_size')==$male_shirt_sizesdatasingle->male_shirt_sizes) selected @endif>{!!$male_shirt_sizesdatasingle->male_shirt_sizes!!}</option>                
                                              @endforeach                
                                              </select>
                                        </div>
                                        <div class="col-sm-10 shrt-size female-size" @if(Input::old('gender')=='male')  style="display: none;" @else   @endif @if(null ===(Input::old('gender'))) style="display: none;" @endif>
                                        <select class="form-control" name="female_size" id="expiry-month">
                                          @foreach ($female_shirt_sizesdata as $female_shirt_sizesdatasingle)                 
                                                <option value="{!!$female_shirt_sizesdatasingle->female_shirt_sizes!!}" @if(Input::old('female_size')==$female_shirt_sizesdatasingle->female_shirt_sizes) selected @endif>{!!$female_shirt_sizesdatasingle->female_shirt_sizes!!}</option>                
                                          @endforeach                
                                          </select>
                                       </div>   
                                    </div>
                                </section>
                                <h1>Shipping Address</h1>    
                                <section>

                                    <div class="form-group">
                                        <label for="dob" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <input name="same_shipping" value="1" type="checkbox" class="chkcheckbox" @if(Input::old('same_shipping')==1) checked @else @endif > Same as Billing Address 
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input required placeholder="Address*" id="input_address" class="form-control" name="address" value="{!! Input::old('address') !!}" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Zipcode</label>
                                        <div class="col-sm-10">
                                            <input required placeholder="zip-code*" id="input_zipcode" class="form-control" name="zipcode" value="{!! Input::old('zipcode')!!}" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('country', $selectCountries,Input::old('country'),array('class' => 'form-control', 'id'=>'mcountry'))       !!} 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('state', $selectStates,Input::old('state'),array('class' => 'form-control ', 'id'=>'mstates')) !!}    
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('city', $selectCities,Input::old('city'),array('class' => 'form-control ', 'id'=>'mcities')) !!}
                                        </div>
                                    </div>

<!-- 



                                    <div class="form-group">
                                        <label for="bio" class="col-sm-2 control-label">Bio <small>(brief intro)</small></label>
                                        <div class="col-sm-10">
                                            <textarea name="bio" id="bio" class="form-control" rows="4">{!! Input::old('bio') !!}</textarea>
                                        </div>
                                    </div> -->

                                </section>

                                <!-- third tab -->
                                <h1>Payment Terms</h1>
                                <section>
                                    <div class="form-group">
                                        <label for="country" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <input type="radio" name="payment_type" value="1" class="chkradio2" @if(Input::old('payment_type')==1) checked @else @endif @if(null ===(Input::old('payment_type'))) checked @endif> Pay In Full<br>
                                            <input type="radio" name="payment_type" value="2" class="chkradio2" @if(Input::old('payment_type')==2) checked @else @endif> Installments<br>
                                            <input type="radio" name="payment_type" value="5" class="chkradio2" @if(Input::old('payment_type')==5) checked @else @endif> No Course Fees<br>
                                            <input type="radio" name="payment_type" value="6" class="chkradio2" @if(Input::old('payment_type')==6) checked @else @endif> Pay By Check
                                        </div>
                                    </div>
                                    <div class="form-group bycheck" @if(Input::old('payment_type')==6)style="display: block;" @else style="display: none;" @endif>
                                        <div class="form-group">
                                            <label for="state" class="col-sm-2 control-label">Check Number</label>
                                            <div class="col-sm-10">
                                                <input id="check_number" name="check_number" type="text" placeholder="Check Number" class="form-control" value="{!! Input::old('check_number') !!}" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="city" class="col-sm-2 control-label">Check Amount</label>
                                            <div class="col-sm-10">
                                                <input id="check_amount" name="check_amount" type="text" placeholder="Check Amount" class="form-control" value="{!! Input::old('check_amount') !!}" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-sm-2 control-label">Bank Name</label>
                                            <div class="col-sm-10">
                                                <input id="bank_name" name="bank_name" type="text" placeholder="Credit Card Number" class="form-control" value="{!! Input::old('bank_name') !!}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10 shrt-size ins-plan" @if(Input::old('payment_type')==2)style="display: block;" @else style="display: none;" @endif>
                                            <select class="form-control" name="installment_plan" id="installmentplan">
                                                <option value="">Select Total Occurences</option>
                                                <option value="6" @if(Input::old('installment_plan')==6) selected @else @endif >6 Months (${!!$membership_price/6!!} per month)</option>
                                                <option value="12" @if(Input::old('installment_plan')==12) selected @else @endif >12 Months (${!!$membership_price/12!!} per month)</option>
                                                
                                              </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="billing_length" value="{!!$billing_length!!}">
                                    <input type="hidden" name="billing_unit" value="{!!$billing_unit!!}">
                                    <input type="hidden" name="billing_count" value="{!!$billing_count!!}">
                                    <input type="hidden" name="userId" value="{!!$userId!!}">
                                    
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
        if($(this).val() == 1 || $(this).val() == 5){
            $('.ins-plan').hide();
            $('.bycheck').hide();
            //$('.male-size').show();
        }else if($(this).val() == 2){
            //$('.male-size').hide();
            $('.ins-plan').show();
            $('.bycheck').hide();
        }else if($(this).val() == 6){
            $('.bycheck').show();
            $('.ins-plan').hide();
        }
        else{

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