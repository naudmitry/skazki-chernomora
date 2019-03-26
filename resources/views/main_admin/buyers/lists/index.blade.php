@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Пользователи',
        'page' => 'Клиенты'
    ])

    <div class="row">
        <div class="col-md-12 buyers-lists">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <button data-href="{{ route('admin.buyer.list.modal') }}" class="btn btn-primary open-buyer-modal" type="button">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="sites-count"><b>0</b></p>
                                    <p>пользователей</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="info">
                                    <p class="amount-total"><b>0</b></p>
                                    <p>заказавших пользователей</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mt-2">
                            <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                        </div>
                    </div>
                </div>

                <div class="tile-body datatable-scroll-lg">
                    <table
                            class="table table-hover"
                            id="buyersListsTable"
                            data-href="{{ route('admin.buyer.list.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>Зарегистрирован/IP</th>
                            <th>Пользователь/Email</th>
                            <th>Телефон</th>
                            <th>Дата последнего входа/IP</th>
                            <th>Статус</th>
                            <th>Реальные заказы</th>
                            <th>Общая сумма</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="div-for-modal"></div>

    <script type="application/x-tmpl-mustache" class="template-buyers-lists-table-column-actions">
        @include('main_admin.buyers.lists.columns.actions')
    </script>
    <script type="application/x-tmpl-mustache" class="template-buyers-lists-table-column-phone">
        @include('main_admin.buyers.lists.columns.phone')
    </script>
    <script type="application/x-tmpl-mustache" class="template-buyers-lists-table-column-status">
        @include('main_admin.buyers.lists.columns.status')
    </script>
    <script type="application/x-tmpl-mustache" class="template-buyers-lists-table-column-orders">
        @include('main_admin.buyers.lists.columns.orders')
    </script>
    <script type="application/x-tmpl-mustache" class="template-buyers-lists-table-column-orders-sum">
        @include('main_admin.buyers.lists.columns.orders_sum')
    </script>
    <script type="application/x-tmpl-mustache" class="template-buyers-lists-table-column-login">
        @include('main_admin.buyers.lists.columns.login')
    </script>
    <script type="application/x-tmpl-mustache" class="template-buyers-lists-table-column-user">
        @include('main_admin.buyers.lists.columns.user')
    </script>
    <script type="application/x-tmpl-mustache" class="template-buyers-lists-table-column-created">
        @include('main_admin.buyers.lists.columns.created')
    </script>
@endsection