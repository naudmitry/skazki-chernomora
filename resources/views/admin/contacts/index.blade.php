@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Контакты',
        'description' => 'Добавление и редактирование сведений страницы контактов',
        'page' => 'Страница контактов'
    ])

    <div class="page-settings">
        @include('admin.page.static.settings')
    </div>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
