@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Компании',
        'page' => 'Список'
    ])

    <div class="row">
        <div class="col-md-12 companies-lists">
            <div class="tile">
                <div class="tile-body">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6 col-lg-3">
                            <button
                                    class="btn btn-primary open-company-add-modal"
                                    type="button"
                                    href="{{ route('admin.company.list.open-modal') }}"
                            ><i class="fas fa-plus-circle mr-2"></i>Добавить</button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="sites-count"><b>0</b></p>
                                    <p>сайтов</p>
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
                                    <p>всего выручка</p>
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
                            id="companiesListsTable"
                            data-href="{{ route('admin.companies.lists.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>Дата создания</th>
                            <th>Наименование компании</th>
                            <th>Сайтов</th>
                            <th>Администратор</th>
                            <th>Страна</th>
                            <th>Выручка</th>
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

    <script type="application/x-tmpl-mustache" class="template-companies-lists-table-column-created">
        @include('main_admin.companies.lists.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-companies-lists-table-column-title">
        @include('main_admin.companies.lists.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-companies-lists-table-column-sites">
        @include('main_admin.companies.lists.columns.sites')
    </script>
    <script type="application/x-tmpl-mustache" class="template-companies-lists-table-column-admin">
        @include('main_admin.companies.lists.columns.admin')
    </script>
    <script type="application/x-tmpl-mustache" class="template-companies-lists-table-column-country">
        @include('main_admin.companies.lists.columns.country')
    </script>
    <script type="application/x-tmpl-mustache" class="template-companies-lists-table-column-amount">
        @include('main_admin.companies.lists.columns.amount')
    </script>
    <script type="application/x-tmpl-mustache" class="template-companies-lists-table-column-enable">
        @include('main_admin.companies.lists.columns.enable')
    </script>
    <script type="application/x-tmpl-mustache" class="template-companies-lists-table-column-actions">
        @include('main_admin.companies.lists.columns.actions')
    </script>
@endsection