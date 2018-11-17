@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Новости',
        'page' => 'Статья в новостях'
    ])

    <div class="row">
        <div class="col-md-12 blog-item">
            @include('main_admin.blog.articles.item.settings')
        </div>
    </div>

    @include('main_admin.blog.articles.item.editor')

    <script type="text/template" class="blog-item-settings-loading-template">
        @include('main_admin.blog.articles.item.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/TinyMCE/tinymce.min.js') }}"></script>
@endsection
