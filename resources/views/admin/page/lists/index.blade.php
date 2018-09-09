@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Пользовательские страницы',
        'description' => 'Добавление и редактирование пользовательских страниц',
        'page' => 'Список страниц'
    ])

    <div class="row">
        <div class="col-md-12 page-lists">
            <div class="tile">
                <div class="tile-body">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6 col-lg-3">
                            <button data-href="{{ route('admin.page.list.create') }}" class="btn btn-primary open-create-form" type="button">
                                <i class="fas fa-plus-circle"></i> Добавить
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
                        <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
                            <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                        </div>
                    </div>
                </div>

                <div class="tile-body datatable-scroll-lg">
                    <table
                            class="table table-hover"
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
                            <th>Автор</th>
                            <th>Обновлено</th>
                            <th>Редактор</th>
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
        @include('admin.page.lists.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-title">
        @include('admin.page.lists.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-category">
        @include('admin.page.lists.columns.category')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-published">
        @include('admin.page.lists.columns.published')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-author">
        @include('admin.page.lists.columns.author')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-updated">
        @include('admin.page.lists.columns.updated')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-updater">
        @include('admin.page.lists.columns.updater')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-viewed">
        @include('admin.page.lists.columns.viewed')
    </script>
    <script type="application/x-tmpl-mustache" class="template-page-lists-table-column-actions">
        @include('admin.page.lists.columns.actions')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mustache.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
