@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Справочники',
        'page' => 'Организации'
    ])

    <div class="row organizations">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <button href="{{ route('admin.organization.edit') }}" class="btn btn-primary open-edit-modal" type="button">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="count"><b>{{ array_get($counters, 'count', 0) }}</b></p>
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
                    <table class="table table-hover" id="organizationsTable" data-href="{{ route('admin.organization.index') }}" width="100%">
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Наименование</th>
                            <th>Автор</th>
                            <th>Адрес</th>
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

    <script type="application/x-tmpl-mustache" class="template-organizations-table-column-actions">
        @include('main_admin.organizations.columns.actions')
    </script>
    <script type="application/x-tmpl-mustache" class="template-organizations-table-column-title">
        @include('main_admin.organizations.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-organizations-table-column-created">
        @include('main_admin.organizations.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-organizations-table-column-address">
        @include('main_admin.organizations.columns.address')
    </script>
    <script type="application/x-tmpl-mustache" class="template-organizations-table-column-author">
        @include('main_admin.organizations.columns.author')
    </script>
@endsection