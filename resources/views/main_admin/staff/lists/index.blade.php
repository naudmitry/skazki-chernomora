@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Персонал',
        'page' => 'Список'
    ])

    <div class="row">
        <div class="col-md-12 admin-lists">
            <div class="tile">
                <div class="tile-body">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6 col-lg-3">
                            <button
                                    class="btn btn-primary open-add-admin-modal"
                                    type="button"
                                    href="{{ route('admin.staff.list.edit') }}"
                            ><i class="fas fa-plus-circle mr-2"></i>Добавить</button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                                <div class="info">
                                    <p class="admins-count"><b>{{ array_get($counters, 'admins-count', 0) }}</b></p>
                                    <p>всего администраторов</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                <div class="info">
                                    <p class="admins-online"><b>{{ array_get($counters, 'admins-online', 0) }}</b></p>
                                    <p>администраторов онлайн</p>
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
                            id="adminListsTable"
                            data-href="{{ route('admin.staff.list.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>Дата регистрации</th>
                            <th>Пользователь</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Последний IP</th>
                            <th>Статус</th>
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

    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-registered-at">
        @include('main_admin.staff.lists.columns.registered_at')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-name">
        @include('main_admin.staff.lists.columns.name')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-phone">
        @include('main_admin.staff.lists.columns.phone')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-email">
        @include('main_admin.staff.lists.columns.email')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-login-from">
        @include('main_admin.staff.lists.columns.login_from')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-status">
        @include('main_admin.staff.lists.columns.status')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-actions">
        @include('main_admin.staff.lists.columns.actions')
    </script>
@endsection