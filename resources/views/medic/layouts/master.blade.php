<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @yield('header__meta')

    <link href="{{ asset('medic/css/site/slick.css') }}" rel="stylesheet"/>
    <link href="{{ asset('medic/css/site/slick-theme.css') }}" rel="stylesheet"/>
    <link href="{{ asset('medic/css/site/jquery.fancybox.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('medic/css/style.css') }}" rel="stylesheet"/>

    <link rel="shortcut icon" href="{{ URL::to('/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::to('/images/favicon.ico') }}" type="image/x-icon">

    @yield('header__sc')
</head>
<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        {{--<div class="preloader"></div>--}}
        <!-- Preloader -->

        @include('medic.vendor.contact')
        @include('medic.vendor.menu')

        @yield('content')
    </div>

    @include('medic.vendor.footer')

    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>

    <script src="{{ asset('medic/js/jquery.js') }}"></script>
    <script src="{{ asset('medic/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('medic/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('medic/js/slick.min.js') }}"></script>
    <script src="{{ asset('medic/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('medic/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('medic/js/wow.js') }}"></script>
    <script src="{{ asset('medic/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('medic/js/jquery.ptTimeSelect.js') }}"></script>
    <script src="{{ asset('medic/js/scripts.js') }}"></script>
    <script src="{{ elixir('main_admin/js/app.js') }}"></script>

    @yield('footer__script')
</body>
</html>
