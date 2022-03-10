@extends('emails/layouts/default')

@section('content')
<p>Hello Admin,</p>

<p>New member registered on the site. Details are:</p>
<p>Name: {!! $user->first_name !!}</p>
<p>Email: {!! $user->email !!}</p>


<p>Best regards,</p>

<p>@lang('general.site_name') Team</p>
@stop
