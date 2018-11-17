@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Главная',
        'page' => 'Главная страница'
    ])

    <div class="page-settings">
        @include('main_admin.page.static.settings')
    </div>
@endsection
