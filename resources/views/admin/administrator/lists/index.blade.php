@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Администраторы',
        'description' => 'Добавление и редактирование списка администраторов',
        'page' => 'Список администраторов'
    ])

    <div class="row">
        <div class="col-md-12 admin-lists">
            <div class="tile">
                <div class="tile-body">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6 col-lg-3">
                            <button data-href="#" class="btn btn-primary open-create-form" type="button">
                                <i class="fas fa-plus-circle"></i> Добавить
                            </button>
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
                        <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
                            <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                        </div>
                    </div>
                </div>

                <div class="tile-body datatable-scroll-lg">
                    <table
                            class="table table-hover"
                            id="adminListsTable"
                            data-href="{{ route('admin.admin.list.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>IP</th>
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

    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-ip">
        @include('admin.administrator.lists.columns.ip')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-user">
        @include('admin.administrator.lists.columns.user')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-phone">
        @include('admin.administrator.lists.columns.phone')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-email">
        @include('admin.administrator.lists.columns.email')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-last-ip">
        @include('admin.administrator.lists.columns.last_ip')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-status">
        @include('admin.administrator.lists.columns.status')
    </script>
    <script type="application/x-tmpl-mustache" class="template-admin-lists-table-column-actions">
        @include('admin.administrator.lists.columns.actions')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mustache.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
