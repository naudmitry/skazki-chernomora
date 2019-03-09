@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Новости',
        'page' => 'Настройка статьи'
    ])

    <div class="row">
        <div class="col-md-12 blog-item">
            @include('main_admin.blog.articles.item.settings')
        </div>
    </div>

    @include('main_admin.blog.articles.item.editor')

    @if (isset($blog->id))
        <div class="row admin-content-header">
            <div class="col-5">
                @include('main_admin.widget.control_panel', compact(
                    'allContainerWidgets', 'activeWidgets', 'widgetContainer'
                ))
            </div>
            <div class="col-7 settings-widget-container" id="setting-widget-pc"></div>
        </div>
    @endif

    <script type="text/template" class="blog-item-settings-loading-template">
        @include('main_admin.blog.articles.item.loading')
    </script>
@endsection