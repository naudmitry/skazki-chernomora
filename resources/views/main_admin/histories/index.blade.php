<div class="tile">
    <div class="tile-body mb-4">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <a href="#" class="btn btn-primary open-history-modal">
                    <i class="fas fa-plus-circle mr-2"></i>Добавить
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon">
                    <div class="circle-icon">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <div class="info">
                        <p class="histories-count">0</p>
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
                        <p class="orders-paid">0</p>
                        <p>оплаченных</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mt-2">
                <input class="form-control form-control-sm history-search" placeholder="Введите и нажмите Enter..." />
            </div>
        </div>
    </div>

    <div class="tile-body datatable-scroll-lg">
        <table class="table table-hover" id="historiesTable" data-href="{{ route('admin.histories.index', ['id' => $object->id, 'type' => $type]) }}">
            <thead>
            <tr>
                <th>Дата</th>
                <th>{{ $columnName }}</th>
                <th>Автор</th>
                <th>Событие</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script type="application/x-tmpl-mustache" class="template-histories-table-column-created">
        @include('main_admin.histories.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-histories-table-column-author">
        @include('main_admin.histories.columns.author')
    </script>
    <script type="application/x-tmpl-mustache" class="template-histories-table-column-event">
        @include('main_admin.histories.columns.event')
    </script>
    <script type="application/x-tmpl-mustache" class="template-histories-table-column-object">
        @include('main_admin.histories.columns.object')
    </script>
</div>