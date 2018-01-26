<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title or get_site_title() }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Scripts -->
    @include('admin.stylesheets')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-blue-light                         |
  |               | skin-black                              |
  |               | skin-black-light                        |
  |               | skin-purple                             |
  |               | skin-purple-light                       |
  |               | skin-yellow                             |
  |               | skin-yellow-light                       |
  |               | skin-red                                |
  |               | skin-red-light                          |
  |               | skin-green                              |
  |               | skin-green-light                        |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @include('admin.header')

      @include('admin.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @if (View::hasSection('buttons') || isset($page_title))
          <section class="content-header">
            <h1>
              {{ $page_title or '' }}
              <small>{{ $page_description or '' }}</small>
            </h1>
            <span class='opt-button'>

              @yield("buttons")

            </span>
          </section>
        @endif

        <!-- Main content -->
        <section class="content">

          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          @yield("content")

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      @include('admin.footer')

      @include('admin.control_sidebar')

      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <div class="loader">
       <center>
           <img class="loading-image" src="{{asset('assets/gears.gif') }}" alt="loading..">
       </center>
    </div>

    <!--Modal-->
    <div id="myDynamicModal" class="modal fade" aria-hidden="true"></div>

    <!-- Scripts -->
    @include('admin.scripts')

  </body>
</html>