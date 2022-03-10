@extends('admin/layouts/default')

{{-- Web site Title --}}

@section('title')
    @lang('productbrand/title.create') :: @parent
@stop

{{-- Content --}}

@section('content')
<section class="content-header">
    <h1>
        @lang('productbrand/title.create')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
            </a>
        </li>
        <li><a href="{{ route('productbrand') }}">Brands</a></li>
        <li class="active">
            @lang('productbrand/title.create')
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="users-add" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('productbrand/title.create')
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="col-sm-8">
                        <div class="has-error">
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                                {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
                            </div>
                        {!! Form::open(array('url' => URL::to('admin/productbrand/create'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=> true)) !!}
                        <div class="form-group {{ $errors->first('title', 'has-error') }}">
                            <label for="title" class="col-sm-4 control-label1">
                                @lang('productbrand/form.name')
                            </label>
                            <div class="col-sm-6">
                                {!! Form::text('title', null, array('class' => 'form-control', 'placeholder'=>'Brand name')) !!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('title', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('status', 'has-error') }}">
                            <label for="status" class="col-sm-4 control-label1">
                                @lang('productbrand/form.status')
                            </label>
                            <div class="col-sm-6">
                                {!! Form::select('status',['0' => 'Inactive', '1' => 'Active'] ,null, array('class' => 'form-control select2', 'placeholder'=>'Select Status'))!!}
                            </div>
                            <div class="col-sm-4">
                                {!! $errors->first('status', '<span class="help-block">:message</span> ') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-4">
                                <a class="btn btn-danger" href="{{ route('productbrand') }}">
                                    @lang('button.cancel')
                                </a>
                                <button type="submit" class="btn btn-success">
                                    @lang('button.save')
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        
                            
                            
                            
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">SEO (Optional)</h4>
                                    <span class="pull-right">
                                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        {!! Form::label('meta_title', 'Meta Title') !!}
                                        {!! Form::text('meta_title', null, array('class' => 'form-control', 'placeholder'=>'Meta Title')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('meta_keywords', 'Meta Keywords') !!}
                                        {!! Form::textarea('meta_keywords', null, array('class' => 'form-control', 'rows'=>'3', 'placeholder'=>'Place meta keywords here.')) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('meta_description', 'Meta Description') !!}
                                        {!! Form::textarea('meta_description', null, array('class' => 'form-control', 'rows'=>'3', 'placeholder'=>'Place meta description here.')) !!}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    
                    <!-- /.col-sm-4 --> </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>
@stop
