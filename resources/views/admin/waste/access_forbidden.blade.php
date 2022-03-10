@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Access Forbidden
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop


{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Access Forbidden</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Pages</li>
        <li class="active">Access Forbidden</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white" style="width: 16px; height: 16px;"></i>
                        Access Forbidden
                    </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                </div>
                <div class="panel-body">
                    <h4>You don't have permission to access this page.</h4>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
