@extends('admin/layouts/default')

{{-- Slider title --}}
@section('title')
@lang('slider/title.create')
@parent
@stop

{{-- slider level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />

    <!--end of page level css-->
@stop


{{-- Slider content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>@lang('slider/title.create')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('sliders') }}">Sliders</a></li>
        <li class="active">@lang('slider/title.create')</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <div class="has-error">
                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('slider_image', '<span class="help-block">:message</span>') !!}
                            
                        </div>
            {!! Form::open(array('url' => URL::to('admin/slider/create'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('title', 'Slider Title') !!}
                            {!! Form::text('title', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Slider title here... (Eg: Hello Word)'))!!}
                        </div>
                        <!-- <div class="form-group">
                            {!! Form::label('button_text', 'Slider Button Text') !!}
                            {!! Form::text('button_text', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Slider button text here... (Eg: Hello Word)'))!!}
                        </div> -->
                        <!-- Color Picker -->
                        <!-- <div class="form-group">
                            <label>Slider Button Text Color</label>
                            <div class="input-group demo3">
                                <input type="slider_button_text_color" class="form-control" value="#333" readonly />
                                <span class="input-group-addon">
                                    <i></i>
                                </span>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            {!! Form::label('link', 'Slider Button Link') !!}
                            {!! Form::text('link', '#', array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Slider button link here... (Eg: http://goole.com)'))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slider_style', 'Slider Style') !!}
                            {!! Form::select('slider_style',['0' => 'Style 1', '1' => 'Style 2'] ,0, array('class' => 'form-control select2', 'placeholder'=>'Slider Style'))!!}
                        </div> -->
                        <div class='box-body pad'>
                            {!! Form::label('content', 'Slider Content') !!}
                            {!! Form::textarea('content', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::label('slider_order', 'Slider Order') !!}
                            {!! Form::text('slider_order', null, array('class' => 'form-control input-md', 'placeholder'=>'Slider Order'))!!}
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Publish</button>
                            <a href="{!! URL::to('admin/page') !!}" class="btn btn-danger">Discard</a>
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Set Slider Image</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('image', 'Slider Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('slider_image', null, array('class' => 'form-control', 'placeholder'=>'Select Slider image', 'id' => 'image')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 2200x563 in Dimensions)
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                {!! Form::close() !!}
        </div>
    </div>
    <!--main content ends-->
</section>
@include('admin.layouts.modal_filemanager', $image_fields)
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!--color picker-->
    <script src="{{ asset('assets/vendors/colorpicker/js/bootstrap-colorpicker.min.js') }}" ></script>
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}" ></script>
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

                external_filemanager_path:"../../../assets/vendors/responsive-filemanager/filemanager/",
                filemanager_title:"Responsive Filemanager" ,
                external_plugins: { "filemanager" : "../../../../vendors/responsive-filemanager/filemanager/plugin.min.js"},
                convert_urls: false
            });
        });
        $(".demo3").colorpicker();
    </script>
@stop