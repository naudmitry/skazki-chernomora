@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Клиенты',
        'page' => 'Добавление клиента'
    ])

    <div class="row">
        <div class="col-md-12 buyer-item">
            @include('main_admin.buyers.item.contents.general')
        </div>
    </div>
@endsection