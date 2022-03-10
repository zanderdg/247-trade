@extends('emails.layouts.default')

@section('content')
<div class="container">
    <div class="content">
        {{ $user->email }}
        {{ $user->first_name }}<p>, new job has been posted. Please check the 24/7 Tradeperson live-leads.</p>
    </div>
</div>
@stop