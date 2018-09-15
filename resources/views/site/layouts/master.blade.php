<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @yield('header__meta')

    <link href="{{ asset('css/site/slick.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/site/slick-theme.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/site/jquery.fancybox.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/site/style.css') }}" rel="stylesheet"/>



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

    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.ptTimeSelect.js') }}"></script>

    <script src="{{ asset('js/script.js') }}"></script>


    @yield('footer__script')
</body>
</html>
