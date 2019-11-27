@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Главная',
        'page' => 'Главная страница'
    ])

    <div class="page-settings">
        @include('main_admin.pages.static.settings')
    </div>

    <div class="row admin-content-header">
        <div class="col-lg-5 col-md-12">
            @include('main_admin.widget.control_panel', compact(
                'allContainerWidgets', 'activeWidgets', 'widgetContainer'
            ))
        </div>
        <div class="col-lg-7 col-md-12 settings-widget-container" id="setting-widget-pc"></div>
    </div>
@endsection
