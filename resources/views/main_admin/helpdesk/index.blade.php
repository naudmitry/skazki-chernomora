@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Коммуникация',
        'page' => 'Help Desk'
    ])

    <div class="row">
        <div class="col-md-12 communication-helpdesk">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <button data-href="#" class="btn btn-primary open-create-form" type="button">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </button>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="info">
                                    <p class="helpdesk-status-new"><b>{{ array_get($counters, 'helpdesk_status_new', 0) }}</b></p>
                                    <p>новых</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="info">
                                    <p class="helpdesk-status-completed"><b>{{ array_get($counters, 'helpdesk_status_completed', 0) }}</b></p>
                                    <p>завершенных</p>
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
                            id="helpDeskTable"
                            data-href="{{ route('admin.helpdesk.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Фамилия</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Номер телефона</th>
                            <th>Текст сообщения</th>
                            <th>Статус</th>
                            <th>Обновлено</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-created">
        @include('main_admin.helpdesk.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-surname">
        @include('main_admin.helpdesk.columns.surname')
    </script>
    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-name">
        @include('main_admin.helpdesk.columns.name')
    </script>
    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-email">
        @include('main_admin.helpdesk.columns.email')
    </script>
    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-phone">
        @include('main_admin.helpdesk.columns.phone')
    </script>
    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-message">
        @include('main_admin.helpdesk.columns.message')
    </script>
    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-status">
        @include('main_admin.helpdesk.columns.status')
    </script>
    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-updated">
        @include('main_admin.helpdesk.columns.updated')
    </script>
    <script type="application/x-tmpl-mustache" class="template-helpdesk-table-column-actions">
        @include('main_admin.helpdesk.columns.actions')
    </script>
@endsection