@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Новости',
        'description' => 'Добавление и редактирование статьи',
        'page' => 'Статья в новостях'
    ])

    <div class="row">
        <div class="col-md-12 blog-item">
            @include('admin.blog.articles.item.settings')
        </div>
    </div>

    @include('admin.blog.articles.item.editor')

    <script type="text/template" class="blog-item-settings-loading-template">
        @include('admin.blog.articles.item.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
