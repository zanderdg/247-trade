@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
{{ 'asdasd' }}
@parent
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Contact us</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Contact Us</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Message
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4><span>Customer Name</span> {{ $message->name }} </h4>
                        <h4><span>Customer Email</span> {{ $message->email }} </h4>
                        <p><span>Message</span> {{ $message->message }} </p>
                    </div>
                </div>
            </div>
        </div>

    </section>


@endsection