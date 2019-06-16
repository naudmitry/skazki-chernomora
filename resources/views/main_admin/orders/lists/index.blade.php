@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Заказы',
        'page' => 'Абонементы'
    ])

    <div class="row">
        <div class="col-md-12 order-lists">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ route('admin.order.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="orders-count"><b>{{ array_get($counters, 'orders_count', 0) }}</b></p>
                                    <p>записей</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="info">
                                    <p class="orders-paid"><b>{{ array_get($counters, 'orders_paid', 0) }}</b></p>
                                    <p>оплаченных</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mt-2">
                            <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                        </div>
                    </div>
                </div>

                <div class="tile-body datatable-scroll-lg">
                    <table class="table table-hover" id="orderListsTable" data-href="{{ route('admin.order.list.index') }}" width="100%">
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Номер</th>
                            <th>Статус</th>
                            <th>Дата начала/окончания</th>
                            <th>Сеансов</th>
                            <th>Соляная пещера</th>
                            <th>Стоимость</th>
                            <th>Оплачено</th>
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
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-number">
        @include('main_admin.orders.lists.columns.number')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-status">
        @include('main_admin.orders.lists.columns.status')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-date">
        @include('main_admin.orders.lists.columns.date')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-sessions">
        @include('main_admin.orders.lists.columns.sessions')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-salt-cave">
        @include('main_admin.orders.lists.columns.salt_cave')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-cost">
        @include('main_admin.orders.lists.columns.cost')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-paid">
        @include('main_admin.orders.lists.columns.paid')
    </script>
    <script type="application/x-tmpl-mustache" class="template-order-lists-table-column-actions">
        @include('main_admin.orders.lists.columns.actions')
    </script>
@endsection