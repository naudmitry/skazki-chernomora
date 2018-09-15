<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Панель администрирования</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">

    @yield('header__sc')
</head>
<body class="app sidebar-mini rtl">
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')

    <main class="app-content">
        @yield('content')
    </main>

    <script src="{{ mix('js/admin/scripts.js') }}"></script>
    <script src="{{ mix('js/admin/app.js') }}"></script>
    <script>$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});</script>

    @yield('footer__script')
</body>
</html>