$(document).ready(function() {

    // disable enter key.
    $("body").bind("keypress", function (e) {  
      if (e.keyCode == 13) {  
        return false;  
      }  
    });

    $('select').on('change', function(){
        $('#data').empty();
        $.ajax({
            url: "data/categoryID",
            type: "GET",
            data: { sub_category_id: $('#sel1').val(), },
            success:function(data){
                if(data){
                    $('#data').html(data);
                    $(document).ready(function() {
                        var wizard_status = null;
                        var $validator = $("#rootwizardForm").validate({
                            rules: {
                                job_auth: "required",
                                job_title: "required",
                                job_description: {
                                    required: true,
                                    maxlength: 1000
                                },
                                job_postcode: {
                                    required: true,
                                    postcodeUK: true
                                },
                            },
                            messages: {
                                job_auth: "Please select any one option.",
                                job_title: "Please specify your job title.",
                                job_description: {
                                    required: "Please describe your job here.",
                                    maxlength: "Max character length is 1000."
                                },
                                job_postcode: {
                                    required: "Please enter valid UK post code.",
                                    postcodeUK: "We accept UK Post Code only."
                                }
                            },
                            errorPlacement: function(error, element) {
                                error.appendTo('.wizard_status');
                            }
                        });

                        // Matches UK postcode. Does not match to UK Channel Islands that have their own postcodes (non standard UK)
                        $.validator.addMethod( "postcodeUK", function( value, element ) {
                            return this.optional( element ) || /^((([A-PR-UWYZ][0-9])|([A-PR-UWYZ][0-9][0-9])|([A-PR-UWYZ][A-HK-Y][0-9])|([A-PR-UWYZ][A-HK-Y][0-9][0-9])|([A-PR-UWYZ][0-9][A-HJKSTUW])|([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY]))\s?([0-9][ABD-HJLNP-UW-Z]{2})|(GIR)\s?(0AA))$/i.test( value );
                        });

                        $('#rootwizard').bootstrapWizard({
                            'tabClass': 'nav nav-pills',
                            'onNext': validateTab,
                            'onTabClick': validateTab,
                            onTabShow: function(tab, navigation, index) {
                                var $total = navigation.find('li').length;
                                var $current = index+1;
                                var $percent = ($current/$total) * 100;
                                $('#rootwizard .progress-bar').css({width:$percent+'%'});
                                $('#rootwizard .progress-bar-striped').html(parseInt($percent)+'%');

                                if($current == $total){
                                $('.last').show();
                                $('.next').hide();
                                } else {
                                $('.last').hide();
                                $('.next').show();
                                }
                            }                       
                        });

                        function validateTab(tab, navigation, index, nextIndex){
                            if (nextIndex <= index){
                                return;
                            }
                            var commentForm = $("#rootwizardForm")
                            var $valid = commentForm.valid();

                            if(!$valid) {
                                $validator.focusInvalid();
                                    $('.wizard_action .error').addClass(['is-invalid']);
                                    setTimeout(() => {
                                    $('.wizard_action .error').removeClass(['is-invalid']);
                                    }, 2000);
                                return false;
                            }
                            
                            if (nextIndex > index+1){
                                for (var i = index+1; i < nextIndex - index + 1; i++){
                                $('#rootwizard').bootstrapWizard('show', i);
                                $valid = commentForm.valid();
                                    if(!$valid) {
                                        $validator.focusInvalid();
                                        return false;
                                    }
                                }
                            return false;
                            }

                        }

                        $('#getValue').on('click', (event) => {
                            event.preventDefault();
                            

                            if(validateTab() != false) {
                            let inputs = $("#rootwizardForm :input");
                            var data = {};                       
                            for (let i = 0; i < inputs.length; i++) {
                                if(inputs[i].type == 'select-one') {
                                data[inputs[i].name] = inputs[i].value
                                } else if(inputs[i].type == 'radio' && inputs[i].checked == true){
                                data[inputs[i].name] = inputs[i].value
                                } else if(inputs[i].type == 'text'){
                                data[inputs[i].name] = inputs[i].value
                                } else if(inputs[i].type == 'textarea'){
                                data[inputs[i].name] = inputs[i].value
                                } else if(inputs[i].type == 'files'){
                                data[inputs[i].name] = inputs[i].value
                                } else if(inputs[i].type == 'submit'){
                                data[inputs[i].type] = inputs[i].innerText
                                }
                            }
                            
                            data = JSON.stringify(data);
                            $('#getValue').empty();
                            $('#getValue').attr('disabled', true);
                            $('#getValue').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="sr-only">Loading...</span>');

                                $.ajax({
                                    type: 'POST',
                                    url: "post-a-job", 
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                    data: {data},
                                    success: function(response) {
                                        console.log("here i'm: ", response);
                                        if(response.statusCode != 2000) {
                                            if(response.locationCode == 197) {
                                                $('#getValue').empty();
                                                $('#getValue').attr('disabled', false);
                                                $('#getValue').html('Need to login');
                                            } else if(response.locationCode == 198) {
                                                $('#getValue').empty();
                                                $('#getValue').attr('disabled', false);
                                                $('#getValue').html('Post my job');
                                            }
                                            $('.wizard_status').html(response.message);
                                        } else {
                                            if(response.locationCode == 197) {
                                                setTimeout(() => {
                                                    window.location.href = 'login';
                                                }, 1000);
                                            } else {
                                                window.location.href = 'account';
                                            }
                                        }
                                    }
                                });
                            
                            
                            }
                        })
                    });            
                } else {
                    $('#data').html('<div class="container text-center"><strong>No Data Found.</strong></div>');
                }
            }
        });
    });
  });  