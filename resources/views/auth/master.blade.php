<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title or get_site_title() }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="{{ mix("css/app.css") }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>{{ trans('app.error') }}!</strong> {{ trans('messages.input_error') }}<br><br>
              <ul class="list-group">
                  @foreach ($errors->all() as $error)
                      <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <div class="login-logo">
        <a href="{{ url('/') }}">{{ get_site_title() }}</a>
      </div>

      @yield('content')

    </div>
    <!-- /.login-box -->

    <script src="{{ mix("js/app.js") }}"></script>
    <script type="text/javascript">
      $(function () {
        $('.icheck').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
      });
    </script>
  </body>
</html>