@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Страницы',
        'description' => 'Добавление и редактирование страниц',
        'page' => 'Настройки'
    ])

    <div class="row">
        <div class="col-md-12 page-item">
            @include('admin.page.lists.item.settings')
        </div>
    </div>

    <script type="text/template" class="page-item-settings-loading-template">
        @include('admin.page.lists.item.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
