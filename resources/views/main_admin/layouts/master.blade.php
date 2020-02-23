<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Панель управления | Sacave</title>
        <meta charset="utf-8">
        <meta name="theme-color" content="#009688"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vali-admin/logo.png') }}" />

        <link rel="stylesheet" href="{{ asset('vali-admin/css/style.css') }}">
        <link rel="stylesheet" href="{{ mix('vali-admin/css/app.css') . '?v=' . time() }}">

        @yield('header__sc')
    </head>

    <body class="app sidebar-mini rtl" @yield('body-data')>
        @include('main_admin.includes.navbar')
        @include('main_admin.includes.sidebar')

        <main class="app-content">
            @yield('content')
        </main>

        @yield('modal')

        <script src="{{ mix('vali-admin/js/app.js') . '?v=' . time() }}"></script>
        <script>$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});</script>
        <script type="text/javascript" src="{{ asset('vali-admin/plugins/tinymce/tinymce.min.js') }}"></script>

        @yield('footer__script')
    </body>
</html>