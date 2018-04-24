@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Пользователи',
        'page' => 'Клиенты'
    ])

    <div class="row">
        <div class="col-md-12 buyers-lists">
            <div class="tile">
                @include('main_admin.buyers.lists.table')
            </div>
        </div>
    </div>

    <div class="div-for-modal"></div>
@endsection