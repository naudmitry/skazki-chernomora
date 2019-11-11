@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Контент',
        'page' => 'Footer'
    ])

    <div class="row admin-content-header">
        <div class="col-md-12 col-lg-5">
            @include('main_admin.widget.control_panel', compact(
                'allContainerWidgets', 'activeWidgets', 'widgetContainer'
            ))
        </div>
        <div class="col-md-12 col-lg-7 settings-widget-container" id="setting-widget-pc"></div>
    </div>
@endsection
