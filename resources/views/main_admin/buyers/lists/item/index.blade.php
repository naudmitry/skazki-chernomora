@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Клиенты',
        'page' => 'Настройка клиента'
    ])

    <div class="row">
        <div class="col-md-12 blog-item">
            @include('main_admin.blog.articles.item.settings')
        </div>
    </div>

    <script type="text/template" class="loading-template">
        @include('main_admin.includes.loading')
    </script>
@endsection