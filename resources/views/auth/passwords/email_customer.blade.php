@extends('auth.master')
@section('content')

@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">Reset Password</p>
  <form role="form" method="POST" action="{{ url('customer/password/email') }}">
    {!! csrf_field() !!}
    <div class="form-group has-feedback">
      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
    </div>
  </form>

<div class="social-auth-links text-center">
  <p>- OR -</p>
  <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
  Facebook</a>
  <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
  Google+</a>
</div>
<!-- /.social-auth-links -->

  <a href="/login" class="btn btn-link">Login</a>
</div>
<!-- /.login-box-body -->
@endsection