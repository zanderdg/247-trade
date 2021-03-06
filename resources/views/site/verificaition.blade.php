@extends('layouts.site.app')



{{-- Page title --}}

@section('title')

User Verificaiton

@parent

@stop



@section('head_style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/css/intlTelInput.css"/>

@endsection



@section('content')



    @if(Request()->confirmationCode == $user->verify_token)

        <div class="container py-5">

            <div id="accordion">

                <div class="card">

                    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#verifyEmail" aria-expanded="true" aria-controls="collapseOne">

                        <h3 class="card-title pb-0 m-0">Verify Email<span class="pull-right clickable"><i class="fa fa-check-circle fa-1x success-icon"></i></span></h3>

                    </div>

                    <div id="verifyEmail" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

                        <div class="card-body py-2 px-3">

                            <i class="fa fa-check-circle mr-2 fa-1x success-icon"></i>Your email <strong>{{ $user->email }}</strong> has been verified.

                        </div>

                    </div>

                </div>

            </div>

            <div id="accordion" class="mt-3">

                <div class="card">

                    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#verifyNumber" aria-expanded="true" aria-controls="verifyNumber">

                    <h3 class="card-title pb-0">Verify Mobile Number<span class="pull-right clickable" id="status" ><i class="fa fa-exclamation-circle fa-1x danger-icon"></i></span></h3>

                    </div>

                    <div id="verifyNumber" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

                        <div class="card-body">

                            <div class="mx-5">

                                <div id="notify"></div>

                                <form id="forNumber">

                                    <label for="number" class="m-0">Contact Number</label>

                                    <hr class="p-0 m-0">

                                    <small>Need to verify your contact number to complete your registration process.</small>

                                    <div class="form-check my-2 form-inline">

                                        <h2 class="p-0 mr-3"> Number </h2>

                                        <input type="tel" class="form-control mb-2 mr-sm-2" name="number" id="v_number">

                                        <input type="hidden" id="v_country" value="GB">

                                        <input type="button" id="getCode" class="btn btn-outline-success" value="Verify">

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div> 

                

            </div>

        </div>

    @endif

    

    @endsection

    

    @section('footer_script')

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/intlTelInput.min.js"></script>    

    <script>

        

        $('footer').hide();

        $('.copyright_section').hide();



        $(document).ready(function() {



            // disable enter key.

            $("body").bind("keypress", function (e) {  

                if (e.keyCode == 13) {  

                return false;  

                }  

            });



            const phoneInputField = document.querySelector("#v_number");

            const phoneInput = window.intlTelInput(phoneInputField, {

                nationalMode: true,

                allowDropdown: false,

                onlyCountries: ["gb"],

                // autoHideDialCode: true,

                placeholderNumberType: "MOBILE",

                separateDialCode: true,

                // hiddenInput: "number",

                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/utils.js"

            });



            $('#getCode').on('click', () => {

                if($('#v_number').val() == '') {

                    $('#notify').empty();

                    $('#notify').append('<div class="alert alert-danger text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong> Enter your mobile number. </div>');

                    setTimeout(() => $('#notify').empty(), 3000);

                } else if(phoneInput.isValidNumber()) {

                    $.ajax({

                        type: "POST",

                        url: "{{ url('checkNumber') }}",

                        data: {

                            number: phoneInput.getNumber(),

                            country: $('#v_country').val(),

                            number_input_field: $('#v_number').val()

                        },

                        success:function(data) {

                            console.log(data);

                            if(data.number != null && data.success) {

                                $('#notify').empty();

                                $('#notify').append('<div class="alert alert-success text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.success+'</div>');

                                AppendData(data);

                                setTimeout(() => {  $('#notify').empty() }, 3000);

                            } else if(data.errors !== undefined) {

                                $('#notify').empty();

                                $('#notify').append('<div class="alert alert-danger text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong>'+data.errors+' </div>');

                                setTimeout(() => {  $('#notify').empty() }, 3000);

                            }

                            $('#verify').on('click', function(){

                                $.ajax({

                                    url: "{{url('number-verifed')}}",

                                    type: "POST",

                                    data: {

                                        token: "{!! Request()->confirmationCode !!}",

                                        full_number: phoneInput.getNumber(),

                                        code: $('input[name="code"]').val(),

                                        country_code: '+'+phoneInput.s.dialCode,

                                        number: $('#v_number').val(),

                                    },

                                    success:function(data){

                                        console.log(data, 'inside success')

                                        if(data.errors){

                                            $('#notify').empty();

                                            $('#notify').append('<div class="alert text-center alert-danger alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong>'+data.errors+' </div>');

                                            setTimeout(() => $('#notify').empty(), 5000);

                                        } else if(data.success){

                                            $('#notify').empty();

                                            $('#status').empty();

                                            $('#status').append('<i class="fa fa-check-circle mr-2 fa-1x success-icon"></i>');

                                            $('#notify').append('<div class="alert alert-success text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong> '+data.success+' </strong></div>');

                                                setTimeout(() => { location.replace('{{ route("client-login") }}'); }, 500);

                                            }

                                        },

                                    errors:function(data){ console.log(data, 'inside errors');

                                    }

                                });

                            });

                        },

                        errors:function(data){ console.log(data);

                        }

                    });

                } else {

                    $('#notify').empty();

                    $('#notify').append('<div class="alert alert-danger text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong> Number doesnt exist in this region! </div>');

                    setTimeout(() => $('#notify').empty(), 3000);

                }

            });



            function numberFieldData() {

                location.reload();

            }

        });  

        

        AppendData = (data) => {

            $('#forNumber').empty();

            $('#forNumber').append('<h4>Please enter the Verificaiton code we sent to ('+data.number+')</h4><div class="form-inline"><input type="number" class="form-control" name="code" id="receviceCode" placeholder="Verificaiton"><input type="hidden" name="phone_number" value='+data.number+' ><input type="button" id="verify" class="ml-3 btn btn-outline-success" value="Submit"></div><!-- <h4 class="mt-4 pb-0">Do not receive a code?</h4><h4 id="resend">Resend Code</h4>-->');

            // setTimeout(() => {

            //     $('#resend').empty();

            //     $('#resend').append('<a href="javascript:;" onclick="ResendCode()" class="btn-link p-0 disabled">Resend Code</a> / <button type="button" onclick="numberFieldData()" class="btn-link p-0">Change Number</button>')

            // }, 30000);

        }

        

        // numberFieldData = () => {

        //     $('#forNumber').empty();

        //     $('#forNumber').append('<label for="number" class="m-0">Contact Number <strong>(without zero)</strong></label><hr class="p-0 m-0"><small>Need to verify your contact number to complete your registration process.</small><div class="form-check my-2 form-inline"><h2 class="p-0 mr-3 "> Number </h2><input type="tel" class="form-control mb-2 mr-sm-2" name="number" id="v_number"><input type="hidden" id="v_country" value="GB"><input type="button" id="getCode" class="btn btn-outline-success" value="Verify"></div>')          

        // }



        // ResendCode = () => {

        //     $.ajax({

        //         url: "{{url('resend-code')}}",

        //         type: "POST",

        //         data: {

        //             _token: "{{ csrf_token() }}",

        //             full_number: $('input[name="phone_number"]').val(),

        //         },

        //         success:function(data){

        //             console.log(data, 'inside success')

        //             if(data.errors){

        //                 $('#notify').empty();

        //                 $('#notify').append('<div class="alert text-center alert-danger alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong>'+data.errors+' </div>');

        //                 setTimeout(() => $('#notify').empty(), 5000);

        //             } else if(data.success){

        //                 $('#notify').empty();

        //                 $('#status').empty();

        //                 $('#status').append('<i class="fa fa-check-circle mr-2 fa-1x success-icon"></i>');

        //                 $('#notify').append('<div class="alert alert-success text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong> '+data.success+' </strong></div>');

        //                     setTimeout(() => { location.replace('{{ route("client-login") }}'); }, 500);

        //                 }

        //             },

        //         errors:function(data){ console.log(data, 'inside errors');

        //         }

        //     });

        // }



    </script>



@endsection