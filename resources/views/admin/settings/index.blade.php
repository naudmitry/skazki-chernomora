@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Настройки',
        'description' => 'Различные настройки сайта',
        'page' => 'Настройки сайта'
    ])

    <div class="tile">
        <h3 class="tile-title">Настройки сайта</h3>
        <div class="row">
            <div class="col-lg-4">
                <div class="bs-component">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active" href="#">
                            <i class="fas fa-cog"></i> Общие настройки
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="far fa-envelope"></i> Контакты
                        </a>
                        <a class="list-group-item list-group-item-action" href="#">
                            <i class="fas fa-share-alt"></i> Социальные сети
                        </a>
                    </div>
                </div>
            </div>

            @include('admin.settings.contacts.index')
        </div>
    </div>
@endsection
