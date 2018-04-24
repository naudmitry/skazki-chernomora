@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Заказы',
        'page' => 'Запись на прием'
    ])

    <div class="row">
        <div class="col-md-12 pre-entries">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="total-count">{{ array_get($counters, 'total_count', 0) }}</p>
                                    <p>всего записей</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-star-of-life"></i>
                                </div>
                                <div class="info">
                                    <p class="fist-count">{{ array_get($counters, 'first_count', 0) }}</p>
                                    <p>первое посещение</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-redo"></i>
                                </div>
                                <div class="info">
                                    <p class="repeated-count">{{ array_get($counters, 'repeated_count', 0) }}</p>
                                    <p>повторное посещение</p>
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
                            width="100%"
                            id="preEntryTable"
                            data-href="{{ route('admin.pre-entry.index') }}"
                    >
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>ФИО</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>На дату</th>
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

    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-created">
        @include('main_admin.pre_entry.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-name">
        @include('main_admin.pre_entry.columns.full_name')
    </script>
    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-phone">
        @include('main_admin.pre_entry.columns.phone')
    </script>
    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-email">
        @include('main_admin.pre_entry.columns.email')
    </script>
    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-date">
        @include('main_admin.pre_entry.columns.date')
    </script>
    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-salt-cave">
        @include('main_admin.pre_entry.columns.salt_cave')
    </script>
    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-type">
        @include('main_admin.pre_entry.columns.type')
    </script>
    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-message">
        @include('main_admin.pre_entry.columns.message')
    </script>
    <script type="application/x-tmpl-mustache" class="template-pre-entries-table-column-actions">
        @include('main_admin.pre_entry.columns.actions')
    </script>
@endsection