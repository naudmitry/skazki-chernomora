@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Новости',
        'page' => 'Главная'
    ])

    <div class="page-settings">
        @include('main_admin.page.static.settings')
    </div>

    <div class="row admin-content-header">
        <div class="col-5">
            @include('main_admin.widget.control_panel', compact(
                'allContainerWidgets', 'activeWidgets', 'widgetContainer'
            ))
        </div>
        <div class="col-7 settings-widget-container" id="setting-widget-pc"></div>
    </div>
@endsection
