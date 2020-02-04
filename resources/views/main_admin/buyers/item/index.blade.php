@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Клиенты',
        'page' => 'Настройка клиента'
    ])

    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#general" data-toggle="tab">
                            Карточка клиента
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#orders" data-toggle="tab">
                            Абонементы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#admins" data-toggle="tab">
                            Администраторы
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @include('main_admin.buyers.item.tabs.general')
                @include('main_admin.buyers.item.tabs.orders')
                @include('main_admin.buyers.item.tabs.admins')
            </div>
        </div>
    </div>

    <script type="text/template" class="loading-template">
        @include('main_admin.includes.loading')
    </script>
@endsection