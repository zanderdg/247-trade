@extends('admin/layouts/default')

{{-- Web site Title --}}

@section('title')
    @lang('menu_link/title.create') :: @parent
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
        @lang('menu_link/title.create')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('menu_links') }}">Menu Links</a></li>
        <li class="active">@lang('menu_link/title.create')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('menu_link/title.create')
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => URL::to('admin/menu_link/create'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=> true)) !!}
                    <div class="form-group {{ $errors->first('name', 'has-error') }}">
                        <label for="name" class="col-sm-2 control-label">
                            @lang('menu_link/form.name')
                        </label>
                        <div class="col-sm-5">
                            {!! Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Menu Name')) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('name', '<span class="help-block">:message</span> ') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">
                            Parent Menu
                        </label>
                        <div class="col-sm-5">
                            {!! Form::select('parent_id',$parent_menus ,null, array('class' => 'form-control select2', 'placeholder'=>'Select Parent Menu'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="page_id" class="col-sm-2 control-label">
                            @lang('menu_link/form.page_id')
                        </label>
                        <div class="col-sm-5">
                            {!! Form::select('page_id', $pages, null, array('class' => 'form-control select2', 'placeholder'=>'Select Page'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="page_id" class="col-sm-2 control-label">
                            Golf Course
                        </label>
                        <div class="col-sm-5">
                            {!! Form::select('golf_course_id', $golf_courses, null, array('class' => 'form-control select2', 'placeholder'=>'Select Golf Course'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short_title" class="col-sm-2 control-label">
                            @lang('menu_link/form.url')
                        </label>
                        <div class="col-sm-5">
                            {!! Form::text('other_url', '#', array('class' => 'form-control', 'placeholder'=>'Menu Other Url')) !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('order', 'has-error') }}">
                        <label for="order" class="col-sm-2 control-label">
                            @lang('menu_link/form.order')
                        </label>
                        <div class="col-sm-1">
                            {!! Form::text('order', 0, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! $errors->first('order', '<span class="help-block">:message</span> ') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">
                            @lang('menu_link/form.menu_location')
                        </label>
                        <div class="col-sm-5">
                            {!! Form::select('menu_location',['1' => 'Header', '2' => 'Footer'] ,null, array('class' => 'form-control select2', 'placeholder'=>'Select Menu Location'))!!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('status', 'has-error') }}">
                        <label for="status" class="col-sm-2 control-label">
                            @lang('menu_link/form.status')
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
                            <a class="btn btn-danger" href="{{ route('menu_links') }}">
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
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script  src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
@stop