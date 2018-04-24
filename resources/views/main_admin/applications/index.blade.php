@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Заказы',
        'page' => 'Заявки'
    ])

    <div class="row">
        <div class="col-md-12 orders-applications">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="orders-count">0</p>
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
                                    <p class="orders-paid">0</p>
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
                    <table class="table table-hover" id="ordersApplicationsTable" data-href="{{ route('admin.application.index') }}" width="100%">
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Страна</th>
                            <th>Обработка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="application/x-tmpl-mustache" class="template-application-table-column-created">
        @include('main_admin.applications.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-application-table-column-name">
        @include('main_admin.applications.columns.name')
    </script>
    <script type="application/x-tmpl-mustache" class="template-application-table-column-email">
        @include('main_admin.applications.columns.email')
    </script>
    <script type="application/x-tmpl-mustache" class="template-application-table-column-phone">
        @include('main_admin.applications.columns.phone')
    </script>
    <script type="application/x-tmpl-mustache" class="template-application-table-column-country">
        @include('main_admin.applications.columns.country')
    </script>
    <script type="application/x-tmpl-mustache" class="template-application-table-column-surname">
        @include('main_admin.applications.columns.surname')
    </script>
    <script type="application/x-tmpl-mustache" class="template-application-table-column-process">
        @include('main_admin.applications.columns.process')
    </script>
    <script type="application/x-tmpl-mustache" class="template-application-table-column-actions">
        @include('main_admin.applications.columns.actions')
    </script>
@endsection