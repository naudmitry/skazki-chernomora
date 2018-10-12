@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Сайты',
        'description' => 'Добавление и редактирование сайтов',
        'page' => 'Список сайтов'
    ])

    <div class="row">
        <div class="col-md-12 showcases">
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
                                    <p class="enabled-total"><b>0</b></p>
                                    <p>доступно</p>
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
                            id="showcasesTable"
                            data-href="{{ route('admin.showcases.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Наименование сайта</th>
                            <th>Веб-адрес</th>
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

    <script type="application/x-tmpl-mustache" class="template-showcases-table-column-created">
        @include('main_admin.showcases.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-showcases-table-column-title">
        @include('main_admin.showcases.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-showcases-table-column-web-address">
        @include('main_admin.showcases.columns.web_address')
    </script>
    <script type="application/x-tmpl-mustache" class="template-showcases-table-column-enable">
        @include('main_admin.showcases.columns.enable')
    </script>
    <script type="application/x-tmpl-mustache" class="template-showcases-table-column-actions">
        @include('main_admin.showcases.columns.actions')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mustache.js') }}"></script>
@endsection
