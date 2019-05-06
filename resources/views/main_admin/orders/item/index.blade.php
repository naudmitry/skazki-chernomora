@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Заказы',
        'page' => 'Основная информация'
    ])

    <div class="row user order-item">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#general" data-toggle="tab">
                            Общая информация
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @include('main_admin.orders.item.tabs.general')
            </div>
        </div>
    </div>

    <script type="text/template" class="loading-template">
        @include('main_admin.includes.loading')
    </script>
@endsection