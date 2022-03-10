$(document).ready(function(){
    $('#edit-service').on('click', (event) => {
        event.preventDefault();
        $.ajax({
            type: "GET",
            url: "setting/service",
            success: function(data) {
                $('#service-data').empty()
                AppendAddServices(data.data)
            }
        })
    });

    AppendAddServices = (data) => {
        $('#service-data').append(data);
        $('.js-example-basic-multiple').select2()
    }

    RemoveAddService = (event) => {
        event.preventDefault()
        location.reload()
    }

    // const phoneInputField = document.querySelector("#v_number");
        // const phoneInput = window.intlTelInput(phoneInputField, {
        //     nationalMode: true,
        //     allowDropdown: false,
        //     onlyCountries: ["gb"],
        //     autoHideDialCode: true,
        //     placeholderNumberType: "MOBILE",
        //     separateDialCode: true,
        //     // hiddenInput: "number",
        //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/utils.js"
        // });

        // $('#getCode').on('click', () => {
        //     if($('#v_number').val() == '') {
        //         $('#notify').empty();
        //         $('#notify').append('<div class="alert alert-danger text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong> Enter your mobile number. </div>');
        //         setTimeout(() => $('#notify').empty(), 3000);
        //     } else if(phoneInput.isValidNumber()) {
        //         // $.ajax({
        //         //     type: "POST",
        //         //     url: "{{ url('checkNumber') }}",
        //         //     data: {
        //         //         number: phoneInput.getNumber(),
        //         //         country: $('#v_country').val(),
        //         //         number_input_field: $('#v_number').val()
        //         //     },
        //         //     success:function(data) {
        //         //         if(data.number != null && data.success) {
        //         //             $('#notify').empty();
        //         //             $('#notify').append('<div class="alert alert-success text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.success+'</div>');
        //         //             AppendData(data);
        //         //             setTimeout(() => {  $('#notify').empty() }, 3000);
        //         //         } else if(data.errors !== undefined) {
        //         //             $('#notify').empty();
        //         //             $('#notify').append('<div class="alert alert-danger text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong>'+data.errors+' </div>');
        //         //             setTimeout(() => {  $('#notify').empty() }, 3000);
        //         //         }
        //         //     },
        //         //     errors:function(data){ 
        //         //     }
        //         // });
        //     } else {
        //         $('#notify').empty();
        //         $('#notify').append('<div class="alert alert-danger text-center alert-dismissable margin5"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error: </strong> Number doesnt exist in this region! </div>');
        //         setTimeout(() => $('#notify').empty(), 3000);
        //     }
        // });
            
        // $('#verify').on('click', function(){
        //     $.ajax({
        //         url: "{{url('number-verifed')}}",
        //         type: "POST",
        //         data: {
        //             token: "{!! Request()->confirmationCode !!}",
        //             full_number: phoneInput.getNumber(),
        //             code: $('input[name="code"]').val(),
        //             country_code: '+'+phoneInput.s.dialCode,
        //             number: $('#v_number').val(),
        //         },
        //         success:function(data){
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
        //         errors:function(data){
        //         }
        //     });
        // });

        // AppendData = (data) => {
        //     $('#forNumber').empty();
        //     $('#forNumber').append('<h4>Please enter the Verificaiton code we sent to ('+data.number+')</h4><div class="form-inline"><input type="number" class="form-control" name="code" id="receviceCode" placeholder="Verificaiton code"><input type="hidden" name="phone_number" value='+data.number+' ><input type="button" id="verify" class="ml-3 btn btn-outline-success" value="Submit"></div><!-- <h4 class="mt-4 pb-0">Do not receive a code?</h4><h4 id="resend">Resend Code</h4>-->');
        //     // setTimeout(() => {
        //     //     $('#resend').empty();
        //     //     $('#resend').append('<a href="javascript:;" onclick="ResendCode()" class="btn-link p-0 disabled">Resend Code</a> / <button type="button" onclick="numberFieldData()" class="btn-link p-0">Change Number</button>')
        //     // }, 30000);
    // }

    // if(getLat == null && getLng == null){
    //     $('#notify').append('');
    // } else {
    //     $('.edit_work_cus').show();
    //     $('.map_div').show();
    // }
});
$('#showPassword').on('click', function (form) {
    if ($('#showPassword').is(":checked")) {
        $('input.form-control').attr('type', 'text'); 
    } else {
        $('input.form-control').attr('type', 'password');
    }
});
jQuery('#validatedPassForm').validate({
    rules : {
        currentPassword: {
            required: true,
            minlength : 8
        },
        newPassword : {
            required: true,
            minlength : 8
        },
        newConfirmPassword : {
            required: true,
            minlength : 8,
            equalTo : "#newPassword"
        }
    },
    errorClass: 'help-inline',
    validClass: 'success',
    errorElement: 'div',
    highlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-valid');
        $(element).addClass('is-invalid');
        $(element).parents("div.invalid-feedback").addClass('invalid-feedback');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        $(element).addClass('is-valid');
        $(element).parents("div.invalid-feedback").removeClass('invalid-feedback');
    },
    messages: {
        currentPassword: {
            required: "Enter your current password.",
        },
        newConfirmPassword : {
            equalTo : "New Password or Confirm Password field doesn't match."
        }
    },
    submitHandler: function(form) {
        let data = {
            oldpass: $('#currentPassword').val(),
            newpass: $('#newPassword').val()
        }
        $.ajax({
            type: 'POST',
            url: 'setting/updatePassword',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: data,
            success: function(data) {
                if(data.statusCode == 200) {
                    $('#message').addClass("alert");
                    $('#message').addClass("alert-success");
                    $('#message').text(data.success);
                    setTimeout(() => {
                        $('#message').removeClass("alert");
                        $('#message').removeClass("alert-success");
                        $('#message').empty();
                    }, 5000);
                } else {
                    $('#message').addClass("alert");
                    $('#message').addClass("alert-danger");
                    $('#message').text(data.danger);
                    setTimeout(() => {
                        $('#message').removeClass("alert");
                        $('#message').removeClass("alert-danger");
                        $('#message').empty();
                    }, 5000);
                }
            }
        })
    }
});
$('#delAccount').on('click', function (e) {
    e.preventDefault();
    let value = $('#value')
    let inputValue = $('#inputValue')
    
    function checkClasses(val) {
        for (var i = 0; i < val[0].classList.length; i++) {
            if (val[0].classList[i] === 'is-invalid') {
                inputValue.removeClass('is-invalid');
            }
        }
    }

    // validating
    if(inputValue.val() === "" || value.text() != inputValue.val() ) {
        inputValue.addClass('is-invalid');
        if (inputValue.val() !== "") inputValue.val('');
        inputValue.attr("placeholder", "Please type the bold letters in this feild.");
    } else if(value.text() == inputValue.val()) {
        checkClasses(inputValue);
        inputValue.addClass('is-valid');
        console.log(value.text() == inputValue.val())
    
        $.ajax({
            type: 'GET',
            url: 'setting/deleteAccount',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:{ requestType: "byUser" },
            success: function(data) {
                if(data) {
                    window.location.href = '/';
                }
            },
            errors: function(data) {
                console.log("In-errors: ",data);
            }       
        })
    }
    
});
$('.updateSetting').on('change', function (e) {
    e.preventDefault();
    
    
    $.post('setting/allowed-notifications', {
        _token: $('meta[name="csrf-token"]').attr('content'),
        notificationType: e.target.name,
        notificationStatus: e.target.checked == false ? 0 : 1
    }).then((res) => {
        $('#message').empty();
        $('#message').append('<div class="alert alert-success text-center alert-dismissable "><strong> '+res.message+' </strong></div>');
        setTimeout(() => {
            $('#message').empty();
        }, 2000);
        
        console.log(res)
    }).catch(error => {
        $('#message').empty();
        $('#message').append('<div class="alert alert-danger text-center alert-dismissable "><strong> '+error.message+' </strong></div>');
        setTimeout(() => {
            $('#message').empty();
        }, 2000);
    });
});