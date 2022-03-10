@extends('admin/layouts/default')

{{-- Web site Title --}}

@section('title')
    @lang('home_banner/title.create') :: @parent
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
        @lang('home_banner/title.create')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Modules</li>
        <li><a href="{{ route('home_banners') }}">Home Banners</a></li>
        <li class="active">@lang('home_banner/title.create')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="image" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('home_banner/title.create')
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => URL::to('admin/home_banner/create'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=> true)) !!}
                    <div class="form-group {{ $errors->first('title', 'has-error') }}">
                        <label for="title" class="col-sm-2 control-label">
                            @lang('home_banner/form.title')
                        </label>
                        <div class="col-sm-5">
                            {!! Form::text('title', null, array('class' => 'form-control', 'placeholder'=>'Banner Title')) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('title', '<span class="help-block">:message</span> ') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('url', 'has-error') }}">
                        <label for="short_title" class="col-sm-2 control-label">
                            @lang('home_banner/form.url')
                        </label>
                        <div class="col-sm-5">
                            {!! Form::text('url', '#', array('class' => 'form-control', 'placeholder'=>'Banner link url')) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('url', '<span class="help-block">:message</span> ') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('image', 'has-error') }}">
                        <label for="image" class="col-sm-2 control-label">
                            @lang('home_banner/form.image')
                        </label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                {!! Form::text('image', null, array('class' => 'form-control', 'placeholder'=>'Image', 'id' => 'image')) !!}
                                <span class="input-group-btn">
                                    <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">
                                        <span class="glyphicon glyphicon-picture"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('image', '<span class="help-block">:message</span> ') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('order', 'has-error') }}">
                        <label for="order" class="col-sm-2 control-label">
                            @lang('home_banner/form.order')
                        </label>
                        <div class="col-sm-1">
                            {!! Form::text('order', 0, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('order', '<span class="help-block">:message</span> ') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('status', 'has-error') }}">
                        <label for="status" class="col-sm-2 control-label">
                            @lang('home_banner/form.status')
                        </label>
                        <div class="col-sm-5">
                            {!! Form::select('status',['0' => 'Inactive', '1' => 'Active'] ,null, array('class' => 'form-control select2', 'placeholder'=>'Select Status'))!!}
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('status', '<span class="help-block">:message</span> ') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <a class="btn btn-danger" href="{{ route('home_banners') }}">
                                @lang('button.cancel')
                            </a>
                            <button type="submit" class="btn btn-success">
                                @lang('button.save')
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

{{-- page level scripts --}}
@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
@stop