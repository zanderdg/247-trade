@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Sub-Categories Preview
@parent
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Sub-Categories</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li >Sub-Categories</li>
            <li class="active">{{$sub_category[0]->name}}</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ucfirst($sub_category[0]->name)}}
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <!--main content-->
                        <div class="col-md-12" style="overflow: hidden;">
                            {{ $category[0] }}
                            {{ $sub_category[0] }}
                        </div>
                        <!--main content end-->
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>


@endsection