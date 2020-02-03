@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Справочники',
        'page' => 'Диагнозы'
    ])

    <div class="row diagnoses">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <button href="{{route('admin.diagnoses.create')}}" class="btn btn-primary open-edit-modal" type="button">
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
                    <table class="table table-hover" id="diagnosesTable" data-href="{{ route('admin.diagnoses.index') }}" width="100%">
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Наименование</th>
                            <th>Количество посещений</th>
                            <th>Автор</th>
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

    <script type="application/x-tmpl-mustache" class="template-diagnoses-lists-table-column-actions">
        @include('main_admin.diagnoses.columns.actions')
    </script>
    <script type="application/x-tmpl-mustache" class="template-diagnoses-lists-table-column-title">
        @include('main_admin.diagnoses.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-diagnoses-lists-table-column-visits">
        @include('main_admin.diagnoses.columns.visits')
    </script>
    <script type="application/x-tmpl-mustache" class="template-diagnoses-lists-table-column-created">
        @include('main_admin.diagnoses.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-diagnoses-lists-table-column-enabled">
        @include('main_admin.diagnoses.columns.enabled')
    </script>
    <script type="application/x-tmpl-mustache" class="template-diagnoses-lists-table-column-author">
        @include('main_admin.diagnoses.columns.author')
    </script>
@endsection