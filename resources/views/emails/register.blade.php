@extends('emails/layouts/default')

@section('content')
<p>Hello {!! $user['full_name'] !!}, Welcome to 24/7 TradesPeople!</p>

<p>Please click on the following link to confirm your account: <a href="{!! URL::to('register/verify/'.$user['token']) !!}">{!! URL::to('register/verify/'.$user['token']) !!}</a></p>

<p>Regards,</p>

<p>@lang('general.site_name') Team</p>
@stop
