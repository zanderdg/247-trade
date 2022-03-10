@extends('layouts.site.app')

@section('head_style')
    <style>
        div#mceu_21 {
            width: 100%!important;
            border-radius: 3px!important;
            border: 1px solid #ced4da!important;
        }
        .form-control:focus {
            color: #495057!important;
            background-color: #fff!important;
            border-color: #80bdff!important;
            outline: 0!important;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25)!important;
        }
</style>    
@endsection

@section('content')

    <div class="container py-5">
        <form action="{{ url('dashboard/job/posting') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="col-md-8">
                <div class="form-group">
                    <div class="form-row">
                        <select name="sub_category" id="sub_category">
                            <option value="" selected>Select Cagetory</option>
                            @foreach ($sub_categories as $sub_category)
                                <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount" class="col-sm-2 control-label">Job Amount</label>
                    <div class="col-sm-10">
                        <input type="number" id="amount" name="amount" placeholder="Job amount" class="form-control required"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="description">Job Description</label>
                        <textarea class="textarea form-control" type="text" name="description" id="description">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <label for="status">Want to publish ? </label>
                        <input class="form-check-input" name="status" id="status" type="checkbox" value="checkedValue" >
                    </label>
                </div>

                <button class="btn" type="submit">Post job</button>
            </div>
        </form>
    </div>

@endsection

@section('footer_script')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>

    <script type="text/javascript">


        $(document).ready(function() {
            tinymce.init({
                selector: ".textarea",
                height : 300,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                image_advtab: true,
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                }, {
                    title: 'Test template 2',
                    content: 'Test 2'
                }],

                external_filemanager_path:"../../../assets/vendors/responsive-filemanager/filemanager/",
                filemanager_title:"Responsive Filemanager" ,
                external_plugins: { "filemanager" : "../../../../vendors/responsive-filemanager/filemanager/plugin.min.js"},
                convert_urls: false
            });
        });

    </script>
@endsection