@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Персонал',
        'page' => 'Страница пользователя'
    ])

    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-settings" data-toggle="tab">Настройки</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-buyers" data-toggle="tab">Клиенты</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @include('main_admin.staff.item.tabs.settings')
                @include('main_admin.staff.item.tabs.buyers', ['adminId' => $admin->id])
            </div>
        </div>
    </div>
@endsection