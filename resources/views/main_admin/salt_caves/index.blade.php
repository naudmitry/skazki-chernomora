@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Администратор',
        'page' => 'Соляные пещеры'
    ])

    <div class="row">
        <div class="col-md-12 salt-caves">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <button href="{{ route('admin.salt-caves.create') }}" class="btn btn-primary open-edit-modal" type="button">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-store-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="count"><b>{{ array_get($counters, 'count', 0) }}</b></p>
                                    <p>соляных пещер</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="info">
                                    <p class="enabled-count"><b>{{ array_get($counters, 'enabled_count', 0) }}</b></p>
                                    <p>доступных</p>
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
                            id="saltCavesTable"
                            data-href="{{ route('admin.salt-caves.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>Дата создания</th>
                            <th>Наименование</th>
                            <th>Адрес</th>
                            <th>Номера телефонов</th>
                            <th>Время работы</th>
                            <th>Доступность</th>
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

    <script type="application/x-tmpl-mustache" class="template-salt-caves-table-column-actions">
        @include('main_admin.salt_caves.columns.actions')
    </script>
    <script type="application/x-tmpl-mustache" class="template-salt-caves-table-column-created">
        @include('main_admin.salt_caves.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-salt-caves-table-column-title">
        @include('main_admin.salt_caves.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-salt-caves-table-column-address">
        @include('main_admin.salt_caves.columns.address')
    </script>
    <script type="application/x-tmpl-mustache" class="template-salt-caves-table-column-phone-numbers">
        @include('main_admin.salt_caves.columns.phone_numbers')
    </script>
    <script type="application/x-tmpl-mustache" class="template-salt-caves-table-column-enabled">
        @include('main_admin.salt_caves.columns.enabled')
    </script>
    <script type="application/x-tmpl-mustache" class="template-salt-caves-table-column-working_time">
        @include('main_admin.salt_caves.columns.working_time')
    </script>
@endsection