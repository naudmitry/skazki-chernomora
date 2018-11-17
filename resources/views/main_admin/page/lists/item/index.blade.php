@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Страницы',
        'page' => 'Настройки'
    ])

    <div class="row">
        <div class="col-md-12 page-item">
            @include('main_admin.page.lists.item.settings')
        </div>
    </div>

    <script type="text/template" class="page-item-settings-loading-template">
        @include('main_admin.page.lists.item.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
@endsection
