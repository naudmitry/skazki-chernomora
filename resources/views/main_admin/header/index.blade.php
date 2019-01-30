@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Контент',
        'page' => 'Header'
    ])

    <div class="row admin-content-header">
        <div class="col-md-6 blog-categories">
            @include('main_admin.widget.control_panel', compact(
                'allContainerWidgets', 'activeWidgets', 'widgetContainer'
            ))
        </div>
    </div>
@endsection
