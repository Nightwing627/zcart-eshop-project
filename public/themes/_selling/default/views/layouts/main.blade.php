<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{ get_site_title() }} </title>


    <!-- Custom Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Theme CSS -->
    <link href="{{ selling_theme_asset_path('css/agency.css') }}" rel="stylesheet">
    <link href="{{ selling_theme_asset_path('css/style.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    @include('nav.mainnav')

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">{{ __('theme.intro_lead') }}</div>
                <div class="intro-heading">{{ __('theme.intro_heading') }}</div>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg selling">{{ __('theme.button.selling') }}</a>
                <p class="sellin-price-tagline">{{ __('theme.selling_price_taglind', ['price' => get_formated_currency($subscription_plans->min('cost'))]) }}</p>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        @yield('content')
    </section>


    <!-- Contact Section -->
    <section id="contact">
        @include('contact')
    </section>

    <footer class="page-footer font-small indigo pt-0">
        <div class="container">
            <ul class="quicklinks navbar nav-justified text-center">
                <li><a href="{{ route('page.open', \App\Page::PAGE_ABOUT_US) }}" target="_blank">{{ trans('theme.nav.about_us') }}</a></li>
                <li><a href="{{ route('page.open', \App\Page::PAGE_PRIVACY_POLICY) }}" target="_blank">{{ trans('theme.nav.privacy_policy') }}</a></li>
                <li><a href="{{ route('page.open', \App\Page::PAGE_TNC_FOR_MERCHANT) }}" target="_blank">{{ trans('theme.nav.term_and_conditions') }}</a></li>
                <li><a href="{{ route('page.open', \App\Page::PAGE_RETURN_AND_REFUND) }}" target="_blank">{{ trans('theme.nav.return_and_refund_policy') }}</a></li>
            </ul>

            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">{{ get_platform_title() }}</span>
                </div>
                <div class="col-md-4 text-center">
                    <span class="copyright">
                        © {{ date('Y') }} Copyright
                        <a href="{{ url('/') }}"> {{ get_platform_title() }} </a>
                    </span>
                </div>
                <div class="col-md-4 ">
                    <ul class="list-inline social-buttons pull-right">
                        <!--Facebook-->
                        @if(config('system_settings.facebook_link'))
                            <li>
                                <a href="{{ config('system_settings.facebook_link') }}" target="_blank">
                                    <i class="fa fa-facebook"> </i>
                                </a>
                            </li>
                        @endif
                        <!--google-plus-->
                        @if(config('system_settings.google_plus_link'))
                            <li>
                                <a href="{{ config('system_settings.google_plus_link') }}" target="_blank">
                                    <i class="fa fa-google-plus"> </i>
                                </a>
                            </li>
                        @endif
                        <!--Twitter-->
                        @if(config('system_settings.twitter_link'))
                            <li>
                                <a href="{{ config('system_settings.twitter_link') }}" target="_blank">
                                    <i class="fa fa-twitter"> </i>
                                </a>
                            </li>
                        @endif
                        <!--Pinterest-->
                        @if(config('system_settings.pinterest_link'))
                            <li>
                                <a href="{{ config('system_settings.pinterest_link') }}" target="_blank">
                                    <i class="fa fa-pinterest"> </i>
                                </a>
                            </li>
                        @endif
                        <!--youtube-->
                        @if(config('system_settings.youtube_link'))
                            <li>
                                <a href="{{ config('system_settings.youtube_link') }}" target="_blank">
                                    <i class="fa fa-youtube"> </i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </footer> <!--/Footer-->

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    {{-- <script src="js/jqBootstrapValidation.js"></script> --}}
    {{-- <script src="js/contact_me.js"></script> --}}

    <!-- Theme JavaScript -->
    <script src="{{ selling_theme_asset_path('js/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ selling_theme_asset_path('js/app.js') }}"></script>

</body>

</html>
