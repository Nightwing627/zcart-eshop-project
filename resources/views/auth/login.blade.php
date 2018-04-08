@extends('auth.master')

@section('content')
<!-- /.login-logo -->
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-7">
                <label>
                    <input type="checkbox" id="remember" name="remember"> Remember Me
                </label>
            </div>
            <!-- /.col -->
            <div class="col-xs-5">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
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

    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    <a class="btn btn-link" href="{{ url('/register') }}" class="text-center">Register here.</a>
</div>
<!-- /.login-box-body -->
@endsection
