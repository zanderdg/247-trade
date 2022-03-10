@extends('admin/layouts/default')

{{-- Location title --}}
@section('title')
@lang('location/title.create')
@parent
@stop

{{-- Location level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of location level css-->
@stop


{{-- Location content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>@lang('location/title.create')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('locations') }}">Locations</a></li>
        <li class="active">@lang('location/title.create')</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            {!! Form::open(array('url' => URL::to('admin/location/create'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, array('class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=>'Location name here... (Eg: Columbus)'))!!}
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Contact Info</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('address', 'Address') !!}
                                    {!! Form::text('address', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Location address here...'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('toll_free', 'Toll Free') !!}
                                    {!! Form::text('toll_free', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Location toll free here...'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('telephone', 'Telephone') !!}
                                    {!! Form::text('telephone', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Location telephone here...'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('fax', 'Fax') !!}
                                    {!! Form::text('fax', null, array('class' => 'form-control input-md', 'required' => 'required', 'placeholder'=>'Location fax here...'))!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('professional', 'Professional to Contact') !!}
                                    {!! Form::select('professional',$professionalDD ,null, array('class' => 'form-control', 'placeholder'=>'Select Professional'))!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Featured Image</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        {!! Form::text('image', null, array('class' => 'form-control', 'placeholder'=>'Select image', 'id' => 'image')) !!}
                                        <span class="input-group-btn">
                                            <button data-select2-open="single-append-text" type="button" class="btn btn-default" data-target="#fileManager0" href="javascript:;" data-toggle="modal">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </button>
                                        </span>
                                    </div>
                                    (Image Size 265x119 in Dimensions)
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">Attributes</h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::select('status',['0' => 'Inactive', '1' => 'Active'] ,1, array('class' => 'form-control select2', 'placeholder'=>'Select Status'))!!}
                                </div>
                                <div class="form-group" style="display: none;">
                                    {!! Form::label('order', 'Order') !!}
                                    {!! Form::text('order', 0, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Publish</button>
                                    <a href="{!! URL::to('admin/location') !!}" class="btn btn-danger">Discard</a>
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

{{-- Location level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}" ></script>
@stop