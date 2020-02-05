@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Заказы',
        'page' => 'Абонементы'
    ])

    <div class="row">
        @include('main_admin.orders.lists.table', [
            'indexRoute' => route('admin.orders.index'),
            'createRoute' => route('admin.orders.create')
        ])
    </div>
@endsection