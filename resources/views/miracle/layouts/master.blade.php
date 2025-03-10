<!DOCTYPE html>
<html dir="ltr" lang="ru">
    <head>
        @yield('header__meta')

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {!! $currentShowcase->config('seo-integration:verification') !!}

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('miracle/images/favicon.ico') }}" />

        <!-- Theme Styles -->
        <link rel="stylesheet" href="{{ asset('miracle/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('miracle/fontawesome/css/font-awesome.min.css') }}">

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,600,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('miracle/css/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/owl-carousel/owl.carousel.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/owl-carousel/owl.transitions.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/mediaelement/mediaelementplayer.min.css') }}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('miracle/components/magnific-popup/magnific-popup.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/revolution_slider/css/settings.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/revolution_slider/css/style.css') }}" media="screen" />

        <link id="main-style" rel="stylesheet" type="text/css" href="{{ route('site.custom-styles') }}">

        @yield('header__ss')
    </head>

    <body @yield('body-data')>
        <div class="pace">
            <div class="pace-activity">
                <div class="page-loading-wrapper">
                    <header>
                        <h1 class="logo">
                            <a href="#">
                                <img src="{{ asset('miracle/images/logo-standard.svg') }}" alt="logo">
                                {{ $currentShowcase->config('general:display-site-name') }}
                            </a>
                        </h1>
                    </header>
                    <div class="progress-bar">
                        <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>

        <div id="page-wrapper">
            <header id="header" class="header-color-white">
                @include('miracle.vendor.navigation.desktop')
                @include('miracle.vendor.navigation.mobile')
            </header>
            @yield('slider')
            @yield('page-title')
            <section id="content">
                @yield('content')
            </section>
            @include('miracle.vendor.footer')
        </div>

        <!-- Javascript -->
        <script src="{{ asset('miracle/js/jquery-2.1.3.min.js') }}"></script>
        <script src="{{ asset('miracle/js/jquery.noconflict.js') }}"></script>
        <script src="{{ asset('miracle/js/modernizr.2.8.3.min.js') }}"></script>
        <script src="{{ asset('miracle/js/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ asset('miracle/js/jquery-ui.1.11.2.min.js') }}"></script>

        <!-- Twitter Bootstrap -->
        <script src="{{ asset('miracle/js/bootstrap.min.js') }}"></script>

        <!-- Magnific Popup core JS file -->
        <script src="{{ asset('miracle/components/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

        <!-- parallax -->
        <script src="{{ asset('miracle/js/jquery.stellar.min.js') }}"></script>

        <!-- waypoint -->
        <script src="{{ asset('miracle/js/waypoints.min.js') }}"></script>

        <!-- Owl Carousel -->
        <script src="{{ asset('miracle/components/owl-carousel/owl.carousel.min.js') }}"></script>

        <!-- load revolution slider scripts -->
        <script src="{{ asset('miracle/components/revolution_slider/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('miracle/components/revolution_slider/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('miracle/components/mediaelement/mediaelement-and-player.js') }}"></script>

        <!-- plugins -->
        <script src="{{ asset('miracle/js/jquery.plugins.js') }}"></script>

        <!-- load page Javascript -->
        <script src="{{ asset('miracle/js/main.js') }}"></script>

        <script src="{{ asset('miracle/js/revolution-slider.js') }}"></script>

        <script src="{{ mix('miracle/js/miracle.js') . '?v=' . time() }}"></script>

        @yield('footer__sc')
    </body>
</html>