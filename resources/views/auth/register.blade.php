@extends('auth.master')

@section('content')
  <div class="box login-box-body">
    <div class="box-header with-border">
      <h3 class="box-title">{{ trans('app.form.register') }}</h3>
    </div> <!-- /.box-header -->
    <div class="box-body">
      {!! Form::open(['route' => 'register', 'id' => 'form', 'data-toggle' => 'validator']) !!}
          <div class="form-group has-feedback">
              {!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.valid_email'), 'required']) !!}
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              <div class="help-block with-errors"></div>
          </div>
          <div class="form-group has-feedback">
              {!! Form::password('password', ['class' => 'form-control input-lg', 'id' => 'password', 'placeholder' => trans('app.placeholder.password'), 'data-minlength' => '6', 'required']) !!}
              <span class="fa fa-lock form-control-feedback"></span>
              <div class="help-block with-errors"></div>
          </div>
          <div class="form-group has-feedback">
              {!! Form::password('password_confirmation', ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.confirm_password'), 'data-match' => '#password', 'required']) !!}
              <span class="fa fa-lock form-control-feedback"></span>
              <div class="help-block with-errors"></div>
          </div>
          <div class="form-group has-feedback">
              {!! Form::text('shop_name', null, ['class' => 'form-control input-lg', 'placeholder' => trans('app.placeholder.shop_name'), 'required']) !!}
              <i class="fa fa-building-o form-control-feedback"></i>
              <div class="help-block with-errors"></div>
          </div>

          <div class="row">
            <div class="col-xs-8">
              <div class="form-group">
                  <label>
                      {!! Form::checkbox('agree', null, null, ['class' => 'icheck', 'required']) !!} {!! trans('app.form.i_agree_with_merchant_terms') !!}
                  </label>
                  <div class="help-block with-errors"></div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              {!! Form::submit(trans('app.form.register'), ['class' => 'btn btn-block btn-lg btn-flat btn-primary']) !!}
            </div>
            <!-- /.col -->
          </div>
      {!! Form::close() !!}

      <a href="{{ route('login') }}" class="btn btn-link">{{ trans('app.form.merchant_login') }}</a>
    </div>
  </div>
  <!-- /.form-box -->
@endsection