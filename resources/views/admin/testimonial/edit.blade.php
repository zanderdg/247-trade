@extends('admin/layouts/default')

{{-- Testimonial title --}}
@section('title')
@lang('Testimonial/title.edit')
@parent
@stop

{{-- Testimonial level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of page level css-->
@stop


{{-- Testimonial content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>@lang('testimonial/title.edit')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('testimonials') }}">Testimonial</a></li>
        <li class="active">@lang('testimonial/title.edit')</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <div class="has-error">
                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('designation', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('testimonial_image', '<span class="help-block">:message</span>') !!}
                            
                        </div>
            {!! Form::model($testimonial, array('url' => URL::to('admin/testimonial') . '/' . $testimonial->id.'/edit', 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                           {!! Form::label('title', 'Testimonial Title') !!}
                            {!! Form::text('title', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Testimonial title here... (Eg: Hello Word)'))!!}
                        </div>
                        <div class="form-group">
                           {!! Form::label('title', 'Testimonial Designation') !!}
                            {!! Form::text('designation', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Testimonial designation here... (Eg: Associate Manager)'))!!}
                        </div>
                        <div class='box-body pad'>
                            {!! Form::label('content', 'Testimonial Content') !!}
                            {!! Form::textarea('content', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
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
                                <h4 class="panel-title">Set Testimonial Image</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('image', 'Testimonial Image') !!}
                                    <div class="input-group">
                                        {!! Form::text('testimonial_image', null, array('class' => 'form-control', 'placeholder'=>'Select Testimonial image', 'id' => 'image')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 150X150 in Dimensions)
                                </div>
                                @if ($testimonial->testimonial_image)
                                    <div class="form-group">
                                        {!! HTML::image('/uploads/source/'.$testimonial->testimonial_image, '', array('style' => 'max-width:150px')) !!}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="checkbox" value="1"@if($testimonial->is_home==1) checked="checked" @endif name="is_home"/>&nbsp;Show On Home ?
                                    </div>
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

{{-- Testimonial level scripts --}}
@section('footer_scripts')
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
    </script>
@stop