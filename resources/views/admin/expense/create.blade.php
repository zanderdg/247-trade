@extends('admin/layouts/default')

@section('title')
Add New Expense
@parent
@stop

@section('header_styles')

{{-- <link href="{{ asset('assets/vendors/select2/select2.min.css') }}" type="text/css" /> --}}
<link href="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">
<!--end of Car level css-->


@stop


{{-- Car content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>Add New Expense</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="14" data-c="#000"
                    data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li><a href="{{ route('expense') }}">Expense</a></li>
        <li class="active">Add New</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            {!! Form::open(array('url' => URL::to('admin/expense/create'), 'method' => 'post', 'class' => 'bf',
            'id'=>'page_form', 'files'=> true)) !!}
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group {{ $errors->first('expense_name', 'has-error') }}">
                        {!! Form::label('expense_name', 'Expense Name') !!}
                        {!! Form::text('expense_name', null, array('class' => 'form-control input-lg', 'required' =>
                        'required', 'placeholder'=>'Expense  Name'))!!}
                        {!! $errors->first('expense_name', '<span class="help-block">:message</span> ') !!}
                    </div>
                    <div class="form-group {{ $errors->first('expense_percent', 'has-error') }}">
                        {!! Form::label('expense_percent', 'Expense Percent') !!}
                        {!! Form::number('expense_percent', null, array('class' => 'form-control input-lg', 'required' =>
                        'required', 'placeholder'=>'Expense Percent'))!!}
                        {!! $errors->first('expense_percent', '<span class="help-block">:message</span> ') !!}
                    </div>
                    <div class="form-group {{ $errors->first('expense_manual', 'has-error') }}">
                        {!! Form::label('expense_manual', 'Expense Manual Allow Client') !!}
                        {!! Form::checkbox('expense_manual', 1, old('expense_manual'), array('class' => 'form-control input-lg', 'placeholder'=>'Expense Manual Allow Client', 'style'=>'width:20px; height:20px;'))!!}
                        {!! $errors->first('expense_manual', '<span class="help-block">:message</span> ') !!}
                    </div>

                    <div class=" form-group">
                        <label for="expense_status" class=" control-label">
                            {!! Form::label('expense_category', 'Expense Category') !!}
                        </label>

                        {{--*/ $s = 0; $m = 50; /*--}}
                        <select name="ec_id" class="form-control input-lg">
                            @foreach($expense_cats as $cats)
                                <option value="{{$cats->ec_id}}">{{$cats->ec_name}}
                            {{--*/ $s++; $m++; /*--}}   
                            @endforeach
                        </select>
                    </div>

                    <div class=" form-group">
                        <label for="expense_status" class=" control-label">
                            {!! Form::label('expense_status', 'Expense Status') !!}
                        </label>
                        {!! Form::select('expense_status',[
                        '0' => 'Disable',
                        '1' => 'Enable'
                        ],
                        null, array('class' => 'form-control input-lg', 'placeholder'=>'Status'))!!}
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Publish</button>
                        <a href="{!! URL::to('admin/expense') !!}" class="btn btn-danger">Discard</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@stop

@section('footer_scripts')

<script src="{{ asset('assets/vendors/tinymce/js/tinymce/tinymce.min.js') }}" type="text/javascript">
</script>
{{-- <script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('assets/vendors/tags/dist/bootstrap-tagsinput.js') }}"></script>

@stop