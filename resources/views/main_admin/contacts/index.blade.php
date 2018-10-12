@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Контакты',
        'description' => 'Добавление и редактирование сведений страницы контактов',
        'page' => 'Страница контактов'
    ])

    <div class="page-settings">
        @include('main_admin.page.static.settings')
    </div>
@endsection
