@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
Theme option
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of page level css-->
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>
        Theme option
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Settings</li>
        <li><a href="{{ route('theme_option') }}">Theme option</a></li>
        <li class="active">Edit Theme option</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit Theme option
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => URL::to('admin/theme_option'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=> true)) !!}
                        <div class="form-group {{ $errors->first('site_logo', 'has-error') }}">
                            <label for="site_logo" class="col-sm-3 control-label">
                                Site Logo
                            </label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    {!! Form::text('site_logo', $data['site_logo'], array('class' => 'form-control', 'placeholder'=>'Site Logo', 'id' => 'site_logo')) !!}
                                    <span class="input-group-btn">
                                        <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('site_logo', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('sender_email', 'has-error') }}">
                            <label for="sender_email" class="col-sm-3 control-label">
                                Sender Email
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('sender_email', $data['sender_email'], array('class' => 'form-control', 'placeholder'=>'Sender Email')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('sender_email', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('contact_email', 'has-error') }}">
                            <label for="contact_email" class="col-sm-3 control-label">
                                Contact Email
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('contact_email', $data['contact_email'], array('class' => 'form-control', 'placeholder'=>'Contact Email')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('contact_email', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="google_analytics_status" class="col-sm-3 control-label">
                                Enable Google Analytics Code
                            </label>
                            <div class="col-sm-3">
                                {!! Form::select('google_analytics_status',['0' => 'No', '1' => 'Yes'] ,$data['google_analytics_status'], array('class' => 'form-control select2', 'placeholder'=>'Enable Google Analytics Code'))!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="google_analytics_code" class="col-sm-3 control-label">
                                Google Analytics Code
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('google_analytics_code', $data['google_analytics_code'], array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place google analytics code here.')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="copyright_text" class="col-sm-3 control-label">
                                Copyright Text
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('copyright_text', $data['copyright_text'], array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place copyright text here.')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="html_head_block" class="col-sm-3 control-label">
                                Html Head Block
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('html_head_block', $data['html_head_block'], array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place html head block here.')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-4">
                                <a class="btn btn-danger" href="{{ route('theme_option') }}">
                                    @lang('button.cancel')
                                </a>
                                <button type="submit" class="btn btn-success">
                                    @lang('button.update')
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>
@include('admin.layouts.modal_filemanager', $image_fields)
@stop

@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
@stop