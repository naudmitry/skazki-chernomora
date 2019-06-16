@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Абонементы',
        'page' => 'Основная информация'
    ])

    <div class="row user order-item">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#general" data-toggle="tab">Общая информация</a>
                    </li>
                    @if ($order->id)
                        <li class="nav-item">
                            <a class="nav-link" href="#family" data-toggle="tab">Семья</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#history" data-toggle="tab">История посещений</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @include('main_admin.orders.item.tabs.general')
                @if ($order->id)
                    @include('main_admin.orders.item.tabs.family')
                    @include('main_admin.orders.item.tabs.history')
                @endif
            </div>
        </div>
    </div>

    <div class="div-for-modal"></div>

    <script type="text/template" class="loading-template">
        @include('main_admin.includes.loading')
    </script>
@endsection