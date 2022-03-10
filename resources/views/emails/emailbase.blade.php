@extends('emails/layouts/default')

@section('content')
        <div class="container">
            <div class="content">
                {!! $emailContent !!}
            </div>
        </div>
@stop
