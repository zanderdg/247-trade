@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
Configuration
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
        Configuration
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Settings</li>
        <li><a href="{{ route('configuration') }}">Configuration</a></li>
        <li class="active">Edit Configuration</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit Configuration
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => URL::to('admin/configuration'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=> true)) !!}
                        <div class="form-group {{ $errors->first('site_title', 'has-error') }}">
                            <label for="site_logo" class="col-sm-2 control-label">
                                Site Title
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('site_title', $data['site_title'], array('class' => 'form-control', 'placeholder'=>'Site Title')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('site_title', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('site_url', 'has-error') }}">
                            <label for="site_url" class="col-sm-2 control-label">
                                Site URL
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('site_url', $data['site_url'], array('class' => 'form-control', 'placeholder'=>'Site URL')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('site_url', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site_phone" class="col-sm-2 control-label">
                                Site Phone
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('site_phone', $data['site_phone'], array('class' => 'form-control', 'placeholder'=>'Site Phone')) !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('site_email', 'has-error') }}">
                            <label for="site_email" class="col-sm-2 control-label">
                                Site Email
                            </label>
                            <div class="col-sm-5">
                                {!! Form::text('site_email', $data['site_email'], array('class' => 'form-control', 'placeholder'=>'Site Email')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('site_email', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_keywords" class="col-sm-2 control-label">
                                Meta Keywords
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('meta_keywords', $data['meta_keywords'], array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place meta keywords here.')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_description" class="col-sm-2 control-label">
                                Meta Description
                            </label>
                            <div class="col-sm-5">
                                {!! Form::textarea('meta_description', $data['meta_description'], array('class' => 'form-control', 'rows'=>'5', 'placeholder'=>'Place meta description here.')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-4">
                                <a class="btn btn-danger" href="{{ route('configuration') }}">
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

@stop

@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
@stop