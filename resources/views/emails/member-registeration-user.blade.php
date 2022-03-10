@extends('emails/layouts/default')

@section('content')
<p>Hello {!! $user->first_name !!},</p>

<p>Welcome to @lang('general.site_name')! </p>
<p>You are registered successfully on the @lang('general.site_name') and also subscribe to our newsletter.</p>

<p>To unsubscribe, click this <a href="{!! $unsubscribe_url !!}" target="_blank">link</a>.</p>

<p>Best regards,</p>

<p>@lang('general.site_name') Team</p>
@stop
