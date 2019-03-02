<!DOCTYPE html>
    <head>
        <title>Miracle | Responsive Multi-Purpose HTML5 Template</title>

        <link rel="shortcut icon" href="{{ asset('miracle/images/favicon.png') }}" />

        <meta charset="utf-8">
        <meta name="description" content="Miracle | Responsive Multi-Purpose HTML5 Template">
        <meta name="author" content="SoapTheme">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @yield('header__meta')

        <!-- Theme Styles -->
        <link rel="stylesheet" href="{{ asset('miracle/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('miracle/css/font-awesome.min.css') }}">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('miracle/css/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/owl-carousel/owl.carousel.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/owl-carousel/owl.transitions.css') }}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('miracle/components/magnific-popup/magnific-popup.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/revolution_slider/css/settings.css') }}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('miracle/components/revolution_slider/css/style.css') }}" media="screen" />

        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('miracle/css/style.css') }}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('miracle/css/custom.css') }}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('miracle/css/updates.css') }}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('miracle/css/responsive.css') }}">
    </head>
    <body>
        <div id="page-wrapper">
            <header id="header" class="header-color-white">
                @include('miracle.vendor.navigation.index')
                {{--@include('miracle.vendor.navigation.mobile')--}}
            </header>

            @yield('slider')

            <section id="content">
                @yield('content')
            </section>

            @include('miracle.vendor.footer')
        </div>

        <!-- Javascript -->
        <script type="text/javascript" src="{{ asset('miracle/js/jquery-2.1.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('miracle/js/jquery.noconflict.js') }}"></script>
        <script type="text/javascript" src="{{ asset('miracle/js/modernizr.2.8.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('miracle/js/jquery-migrate-1.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('miracle/js/jquery-ui.1.11.2.min.js') }}"></script>

        <!-- Twitter Bootstrap -->
        <script type="text/javascript" src="{{ asset('miracle/js/bootstrap.min.js') }}"></script>

        <!-- Magnific Popup core JS file -->
        <script type="text/javascript" src="{{ asset('miracle/components/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

        <!-- parallax -->
        <script type="text/javascript" src="{{ asset('miracle/js/jquery.stellar.min.js') }}"></script>

        <!-- waypoint -->
        <script type="text/javascript" src="{{ asset('miracle/js/waypoints.min.js') }}"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="{{ asset('miracle/components/owl-carousel/owl.carousel.min.js') }}"></script>

        <!-- load revolution slider scripts -->
        <script type="text/javascript" src="{{ asset('miracle/components/revolution_slider/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('miracle/components/revolution_slider/js/jquery.themepunch.revolution.min.js') }}"></script>

        <!-- plugins -->
        <script type="text/javascript" src="{{ asset('miracle/js/jquery.plugins.js') }}"></script>

        <!-- load page Javascript -->
        <script type="text/javascript" src="{{ asset('miracle/js/main.js') }}"></script>

        <script type="text/javascript" src="{{ asset('miracle/js/revolution-slider.js') }}"></script>

        @yield('footer__sc')
    </body>
</html>