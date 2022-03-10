@extends('layouts.site.app')

{{-- Page title --}}
@section('title')
Password Reset
@parent
@stop

@section('content')

    <section class="reset-section">
        <div class="container py-5">
            <div class="offset-md-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1>New Password</h1>
                        <form action="{{ route('client-reset-password', [$userId, $passwordResetCode]) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="New Password">
                            </div>
                            @if($errors->resetPassword->first('password'))
                                <div id="password" class="invalid-feedback">
                                    {{ $errors->resetPassword->first('password') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="password" name="password_confirm" class="form-control" placeholder="New Confirm Password">
                            </div>
                            @if($errors->resetPassword->first('password_confirm'))
                                <div id="password_confirm" class="invalid-feedback">
                                    {{ $errors->resetPassword->first('password_confirm') }}
                                </div>
                            @endif
                            <div class="mt-4">
                                <button type="submit" class="btn btn-outline-success">Save Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection