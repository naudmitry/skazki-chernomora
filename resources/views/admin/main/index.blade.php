@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Главная',
        'description' => 'Добавление и редактирование сведений главной страницы сайта',
        'page' => 'Главная страница'
    ])

    <div class="page-settings">
        @include('admin.page.static.settings')
    </div>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
