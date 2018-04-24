@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Вопросы',
        'page' => 'Настройка вопроса'
    ])

    <div class="row">
        <div class="col-md-12 faq-item">
            @include('main_admin.faq.questions.item.settings')
        </div>
    </div>

    @if (isset($faq->id))
        <div class="row admin-content-header">
            <div class="col-5">
                @include('main_admin.widget.control_panel', compact(
                    'allContainerWidgets', 'activeWidgets', 'widgetContainer'
                ))
            </div>
            <div class="col-7 settings-widget-container" id="setting-widget-pc"></div>
        </div>
    @endif

    <script type="text/template" class="faq-item-settings-loading-template">
        @include('main_admin.faq.questions.item.loading')
    </script>
@endsection