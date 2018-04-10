@extends('auth.master')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Reset Password</p>
    <form role="form" method="POST" action="{{ url('customer/password/reset') }}">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </form>
</div>
@endsection
