<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Medic | Medical HTML Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Slick Carousel -->
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ URL::to('/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::to('/images/favicon.ico') }}" type="image/x-icon">

    @yield('header__sc')
</head>
<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        {{--<div class="preloader"></div>--}}
        <!-- Preloader -->

        @include('site.vendor.social')
        @include('site.vendor.contact')
        @include('site.vendor.menu')

        @yield('content')
    </div>

    @include('site.vendor.footer')

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <!-- Google Map -->
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>--}}
    {{--<script src="plugins/google-map/gmap.js"></script>--}}

    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.ptTimeSelect.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @yield('footer__script')
</body>
</html>