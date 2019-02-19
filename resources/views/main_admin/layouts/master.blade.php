<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Панель управления | Sacave</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('vali-admin/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vali-admin/css/dragula.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vali-admin/css/style.css') }}">

        @yield('header__sc')
    </head>

    <body class="app sidebar-mini rtl" @yield('body-data')>
        @include('main_admin.includes.navbar')
        @include('main_admin.includes.sidebar')

        <main class="app-content">
            @yield('content')
        </main>

        @yield('modal')

        <script src="{{ mix('vali-admin/js/app.js') }}"></script>
        <script>$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});</script>

        @yield('footer__script')
    </body>
</html>