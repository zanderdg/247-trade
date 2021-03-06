
<section class="mt-2" id="wizard">
    <div class="page-header">
        {{-- <h1>Wizard With Progress Bar using events</h1>  --}}
    </div>
        <div id="rootwizard">
        <div class="navbar" >
            <div class="navbar-inner" style="visibility:hidden; z-index:-1; position:absolute;" >
                <div class="container">
                    <ul>
                        @foreach($questions as $question)
                            <li><a href="#tab{{ $question->id }}" data-toggle="tab">First</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div id="bar" class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 tab-content wizard_action py-2">
                @foreach($questions as $question)
                    {{-- {{ $question }} --}}
                    <div class="tab-pane" id="tab{{ $question->id }}">
                        <p><strong>{{ $question->question }}</strong></p>
                        @if($question->answer_type == 'radio')
                        @foreach($question->answer as $answer)
                            <label class="radio"><span>{{ $answer }}</span>
                                <input type="radio" name="{{$question->title}}" value="{{ $answer }}">
                                <span class="checkround"></span>
                            </label>
                        @endforeach
                        @elseif($question->answer_type == 'text')
                            <input type="text" name="{{ $question->title }}" class="form-control">
                        @elseif($question->answer_type == 'textarea')
                            <textarea name="{{ $question->title }}" class="form-control resize-none" cols="30" rows="10"></textarea>
                        @elseif($question->answer_type == 'image')
                        <div class="field image-upload" align="left">
                            <label for="file-input" id="camera_btn">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                            </label>
                            <input type="file" id="files" name="{{ $question->title }}" multiple/>
                        </div>
                        <!-- <div class="image-upload">
                            <label for="file-input">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                            </label>

                            <input id="file-input" type="file"/>
                        </div> -->
                        @elseif($question->answer_type == 'select')
                            <select name="{{ $question->title }}" class="form-control">
                                <option selected disabled>Select</option>
                                @foreach($question->answer as $answer)
                                    <option value="{{ $answer }}">{{ $answer }}</option>
                                @endforeach
                            </select>
                            <div class="alert alert-info my-4">
                                <p>
                                    <i class="fa fa-exclamation-circle mr-2"></i>
                                    You're not committing to anything here. 
                                    <strong> It's just a guide. </strong>
                                </p>
                            </div>
                        @endif
                    </div>
                @endforeach
                <hr>
                <ul class="pl-0 d-flex align-items-start flex-row pager wizard">
                    <li class="previous first" style="display:none;"><a class="btn" href="#">First</a></li>
                    <li class="mr-auto previous"><a class="btn btn-sm btn-outline-info" href="#">Previous</a></li>
                    @if(Sentinel::check())
                    <li class="ml-auto last" style="display:none;">
                        <button class="btn btn-sm btn-outline-success" id="getValue" type="submit">Post my job</button>
                    </li>
                    @else
                    <li class="ml-auto last" style="display:none;">
                        <button class="btn btn-sm btn-outline-success" id="getValue" type="submit">login / Sign up</button>
                    </li>
                    @endif
                    <li class="ml-auto next"><a class="btn btn-sm btn-outline-success" href="#">Next</a></li>
                </ul>
            </div>
            <div class="col-md-6 wizard_status py-5">
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        var totalImage = [];
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                if(totalImage.length >= 5){
                    alert('Your reach the limit.');
                    return;
                }
                var files = e.target.files,
                filesLength = files.length;
                if (filesLength >= 5) {
                    alert('Select 5 image or less.');
                    return;
                }
                for (var i = 0; i < filesLength; i++) {
                    console.log(totalImage, 'inside loop.');
                    if (totalImage.length <= 5) {
                        totalImage.push(i);
                        var f = files[i];
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">X</span>" +
                                "</span>").insertAfter("#files");
                            $(".remove").click(function(){
                                $(this).parent(".pip").remove();
                                totalImage.splice(1);
                            });
                            // Old code here
                            /*$("<img></img>", {
                                class: "imageThumb",
                                src: e.target.result,
                                title: file.name + " | Click to remove"
                            }).insertAfter("#files").click(function(){$(this).remove();});*/
                        });
                        fileReader.readAsDataURL(f);
                    }
                }
                console.log(totalImage, 'outside loop.');
            });
        } else {
            alert("Your browser doesn't support to File API")
        }


        $('input[name="job_postcode"]').on('change', function() {
            $('input[name="job_postcode"]').val(formatPostcode($('input[name="job_postcode"]').val()));
        });

        function formatPostcode(str) {
            str = str.toUpperCase();
            str = str.replace(/[^0-9a-z]/gi, '');
            var parts = str.match(/^([A-Z]{1,2}\d{1,2}[A-Z]?)\s*(\d[A-Z]{2})$/);
        parts.shift();
            str = parts.join(' ');
            return str;
        }
    });
</script>

