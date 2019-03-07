@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Страницы',
        'page' => 'Настройка страницы'
    ])

    <div class="row page-item">
        <div class="col-md-12 page-settings">
            @include('main_admin.page.lists.item.settings')
        </div>
    </div>

    @include('main_admin.page.lists.item.editor')

    @if (isset($page->id))
        <div class="row admin-content-header">
            <div class="col-5">
                @include('main_admin.widget.control_panel', compact(
                    'allContainerWidgets', 'activeWidgets', 'widgetContainer'
                ))
            </div>
            <div class="col-7 settings-widget-container" id="setting-widget-pc"></div>
        </div>
    @endif

    <script type="text/template" class="page-item-settings-loading-template">
        @include('main_admin.page.lists.item.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('vali-admin/plugins/tinymce/tinymce.min.js') }}"></script>
@endsection
