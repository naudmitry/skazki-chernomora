@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Заказы',
        'page' => 'Список'
    ])

    <div class="row">
        <div class="col-md-12 order-lists">
            <div class="tile">
                <div class="tile-body datatable-scroll-lg">
                    <table class="table table-hover" id="orderListsTable" data-href="{{ route('admin.order.list.index') }}" width="100%">
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Имя</th>
                            <th>Номер телефона</th>
                            <th>Email</th>
                            <th>Дата записи</th>
                            <th>Соляная пещера</th>
                            <th>Тип</th>
                            <th>Сообщение</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-created">
        @include('main_admin.orders.lists.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-name">
        @include('main_admin.orders.lists.columns.name')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-phone-number">
        @include('main_admin.orders.lists.columns.phone_number')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-email">
        @include('main_admin.orders.lists.columns.email')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-desired-date">
        @include('main_admin.orders.lists.columns.desired_date')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-salt-cave">
        @include('main_admin.orders.lists.columns.salt_cave')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-type">
        @include('main_admin.orders.lists.columns.type')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-message">
        @include('main_admin.orders.lists.columns.message')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-actions">
        @include('main_admin.orders.lists.columns.actions')
    </script>
@endsection