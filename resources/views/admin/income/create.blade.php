@extends('admin/layouts/default')

@section('title')
Add New Income
@parent
@stop

@section('header_styles')
<link href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
@stop

{{-- Car content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>Add New Income</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000"
                    data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('cars') }}">Cars</a></li>
        <li class="active">Add New</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            {!! Form::open(array('url' => URL::to('admin/income/create'), 'method' => 'post', 'class' => 'bf',
            'id'=>'page_form', 'files'=> true)) !!}
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group {{ $errors->first('income_name', 'has-error') }}">
                        {!! Form::label('income_name', 'Income Name') !!}
                        {!! Form::text('income_name', null, array('class' => 'form-control input-lg', 'required' =>
                        'required', 'placeholder'=>'Income Name'))!!}
                        {!! $errors->first('income_name', '<span class="help-block">:message</span> ') !!}
                    </div>
                    <div class="form-group {{ $errors->first('income_percent', 'has-error') }}">
                        {!! Form::label('income_percent', 'Income Percent') !!}
                        {!! Form::number('income_percent', null, array('class' => 'form-control input-lg', 'required' =>
                        'required', 'placeholder'=>'Income Percent'))!!}
                        {!! $errors->first('income_percent', '<span class="help-block">:message</span> ') !!}
                    </div>
                    <!-- <div class="form-group {{ $errors->first('income_manual', 'has-error') }}">
                        {!! Form::label('income_manual', 'Income Manual Allow Client') !!}
                        {!! Form::checkbox('income_manual', 1, old('income_manual'), array('class' => 'form-control input-lg', 'placeholder'=>'Income Manual Allow Client', 'style'=>'width:20px; height:20px;'))!!}
                        {!! $errors->first('income_manual', '<span class="help-block">:message</span> ') !!}
                    </div> -->
                    <div class="form-group {{ $errors->first('income_multi_fields', 'has-error') }}">
                        {!! Form::label('income_multi_fields', 'Income Multi Field') !!}
                        <small> like in Uber, OLA, Didi</small>
                        {!! Form::checkbox('income_multi_fields', 1, old('income_multi_fields'), array('class' => 'form-control input-lg', 'placeholder'=>'Income Multi Field', 'style'=>'width:20px; height:20px;'))!!}
                        {!! $errors->first('income_multi_fields', '<span class="help-block">:message</span> ') !!}
                    </div>

                    <div class=" form-group">
                        <label for="income_status" class=" control-label">
                            {!! Form::label('income_status', 'Income Status') !!}
                        </label>
                        {!! Form::select('income_status',[
                        '0' => 'Disable',
                        '1' => 'Enable'
                        ],
                        null, array('class' => 'form-control input-lg', 'placeholder'=>'Status'))!!}
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Publish</button>
                        <a href="{!! URL::to('admin/income') !!}" class="btn btn-danger">Discard</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@stop

@section('footer_scripts')
<script src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}"></script>
@stop