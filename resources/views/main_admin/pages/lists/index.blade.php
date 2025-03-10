@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Страницы',
        'page' => 'Список'
    ])

    <div class="row">
        <div class="col-md-12 page-lists">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <button data-href="{{ route('admin.page.list.create') }}" class="btn btn-primary open-create-form" type="button">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="enable-news-count"><b>{{ array_get($counters, 'enable_pages_count', 0) }}</b></p>
                                    <p>страниц онлайн</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="info">
                                    <p class="view-count-total"><b>{{ array_get($counters, 'view_count_total', 0) }}</b></p>
                                    <p>всего просмотров</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mt-2">
                            <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                        </div>
                    </div>
                </div>

                <div class="tile-body">
                    <table
                            class="table table-lg table-hover"
                            id="pageListsTable"
                            data-href="{{ route('admin.page.list.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Наименование</th>
                            <th>Категория</th>
                            <th>Опубликован</th>
                            <th>Обновлено</th>
                            <th>Просмотрено</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-created">
        @include('main_admin.pages.lists.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-title">
        @include('main_admin.pages.lists.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-category">
        @include('main_admin.pages.lists.columns.category')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-published">
        @include('main_admin.pages.lists.columns.published')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-updated">
        @include('main_admin.pages.lists.columns.updated')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-viewed">
        @include('main_admin.pages.lists.columns.viewed')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-actions">
        @include('main_admin.pages.lists.columns.actions')
    </script>
@endsection