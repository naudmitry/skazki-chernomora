@extends('main_admin.layouts.master')

@section('body-data') data-page="settings.general" @endsection

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Настройки',
        'page' => 'Общие'
    ])

    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#user-timeline" data-toggle="tab">
                            Основные
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#geo-ip" data-toggle="tab">
                            Geo-ip
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab">
                            Социальные сети
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="tab">
                            Бухгалтерские данные
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @include('main_admin.settings.general.index')
                @include('main_admin.settings.geo-ip.index')
            </div>
        </div>
    </div>
@endsection
