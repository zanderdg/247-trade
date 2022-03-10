@extends('admin/layouts/default')

{{-- FAQ title --}}
@section('title')
@lang('FAQ/title.create')
@parent
@stop

{{-- FAQ level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of page level css-->
@stop


{{-- FAQ content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>@lang('faq/title.create')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('faqs') }}">FAQ's</a></li>
        <li class="active">@lang('faq/title.create')</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <div class="has-error">
                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            
                            {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                            
                        </div>
            {!! Form::open(array('url' => URL::to('admin/faq/create'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Faq Question') !!}
                            {!! Form::text('question', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Faq title here... (Eg: Hello Word)'))!!}
                        </div>
                        <div class='box-body pad'>
                            {!! Form::label('content', 'Faq Answer') !!}
                            {!! Form::textarea('answer', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Publish</button>
                            <a href="{!! URL::to('admin/page') !!}" class="btn btn-danger">Discard</a>
                        </div>
                    </div>
                 </div>
                {!! Form::close() !!}
        </div>
    </div>
    <!--main content ends-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    {{-- <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}" ></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // TinyMCE Full
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

                // external_filemanager_path:"../../../assets/vendors/responsive-filemanager/filemanager/",
                // filemanager_title:"Responsive Filemanager" ,
                // external_plugins: { "filemanager" : "../../../../vendors/responsive-filemanager/filemanager/plugin.min.js"},
                // convert_urls: false
            });
        });
    </script>
@stop