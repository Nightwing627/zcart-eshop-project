<!-- Main Header -->
<header class="main-header">
  <!-- Logo -->
  <a href="{{ url('/') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">{{ str_limit(get_site_title(), 2, '.') }}</span>

    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{{ get_site_title() }}</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        @php
          $count_message = Auth::user()->messages->count();
        @endphp
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">{{ $count_message ? $count_message : '' }}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">{{ trans('messages.message_count', ['count' => $count_message]) }}</li>
            <li>
              <!-- inner menu: contains the messages -->
              <ul class="menu">
                @forelse(Auth::user()->messages as $message)
                  <li><!-- start message -->
                    <a href="{{ route('admin.support.message.show', $message) }}">
                      <div class="pull-left">
                        <!-- User Image -->
                        @if($message->customer->image)
                          <img src="{{ get_storage_file_url($message->customer->image->path, 'tiny') }}" class="img-circle" alt="{{ trans('app.avatar') }}">
                        @else
                          <img src="{{ get_gravatar_url($message->customer->email, 'tiny') }}" class="img-circle" alt="{{ trans('app.avatar') }}">
                        @endif
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        {{ $message->subject }}
                        <small><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }}</small>
                      </h4>
                      <!-- The message -->
                      <p>
                        {{ str_limit($message->message, 100) }}
                      </p>
                    </a>
                  </li>
                @endforeach
                <!-- end message -->
              </ul>
              <!-- /.menu -->
            </li>
            <li class="footer"><a href="{{ url('admin/support/message/labelOf/'. App\Message::LABEL_INBOX) }}">{{ trans('app.go_to_msg_inbox') }}</a></li>
          </ul>
        </li>
        <!-- /.messages-menu -->

        @if(Gate::allows('index', App\Ticket::class) || Gate::allows('index', App\Dispute::class) || Gate::allows('index', App\Refund::class))
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
        @endcan

        <!-- Notifications Menu -->
        @php
          $count_notification = Auth::user()->unreadNotifications->count();
        @endphp
        <li class="dropdown notifications-menu" id="notifications-dropdown">
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{ $count_notification ? $count_notification : '' }}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">{{ trans('messages.notification_count', ['count' => $count_notification]) }}</li>
            <li>
              <!-- Inner Menu: contains the notifications -->
              <ul class="menu">
                @foreach(Auth::user()->unreadNotifications as $notification)
                <li>
                  @php
                    $notification_view = 'admin.partials.notifications.' . snake_case(class_basename($notification->type));
                  @endphp

                  @includeFirst([$notification_view, 'admin.partials.notifications.default'])
                </li>
                @endforeach
              </ul>
            </li>
            <li class="footer"><a href="{{ route('admin.notifications') }}">{{ trans('app.view_all_notifications') }}</a></li>
          </ul>
        </li>

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->

            @if(Auth::user()->image)
              <img src="{{ get_storage_file_url(Auth::user()->image->path, 'tiny') }}" class="user-image" alt="{{ trans('app.avatar') }}">
            @else
              <img src="{{ get_gravatar_url(Auth::user()->email, 'tiny') }}" class="user-image" alt="{{ trans('app.avatar') }}">
            @endif
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ ($Tname = Auth::user()->getName()) ? $Tname : trans('app.welcome') }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              @if(Auth::user()->image)
                <img src="{{ get_storage_file_url(Auth::user()->image->path, 'small') }}" class="user-image" alt="{{ trans('app.avatar') }}">
              @else
                <img src="{{ get_gravatar_url(Auth::user()->email, 'small') }}" class="user-image" alt="{{ trans('app.avatar') }}">
              @endif

              <h4>{{Auth::user()->name}}</h4>
              <p>
                @if(Auth::user()->isSuperAdmin())
                  {{ trans('app.super_admin') }}
                @else
                  @if(Auth::user()->isFromPlatform())
                    {{ Auth::user()->role->name }}
                  @elseif(Auth::user()->isMerchant())
                    {{ Auth::user()->owns ? Auth::user()->owns->name : Auth::user()->role->name }}
                  @else
                    {{ Auth::user()->role->name . ' | ' . Auth::user()->shop->name }}
                  @endif
                @endif

                <small>{{ trans('app.member_since') . ' ' . Auth::user()->created_at->diffForHumans() }}</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('admin.profile.view') }}" class="btn btn-default btn-flat">{{ trans('app.profile') }}</a>
              </div>
              <div class="pull-right">
                <a href="{{ Request::session()->has('impersonated') ? route('admin.secretLogout') : route('logout') }}" class="btn btn-default btn-flat">{{ trans('app.log_out') }}</a>
              </div>
            </li>
          </ul>
        </li>

        <!-- Lang Menu -->
        <li class="dropdown tasks-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('images/flags/US.png') }}" class="user-image" style="width: 15px; vertical-align: inherit;" alt="US">
          </a>
          <ul class="dropdown-menu" style="width: 100px;">
            <li>
              <!-- Inner menu: contains the tasks -->
              <ul class="menu">
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      <img src="{{ asset('images/flags/BD.png') }}" class="user-image" style="width: 15px; vertical-align: inherit;" alt="BD">
                      English
                    </h3>
                  </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      <img src="{{ asset('images/flags/US.png') }}" class="user-image" style="width: 15px; vertical-align: inherit;" alt="US">
                      English
                    </h3>
                  </a>
                </li>
                <!-- end task item -->
              </ul>
            </li>
          </ul>
        </li>

        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>