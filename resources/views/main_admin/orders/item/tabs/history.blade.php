<div class="tab-pane" id="history">
    <div class="tile">
        <div class="tile-body mb-4">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <a href="{{ route('admin.order.open-modal', ['order' => $order->id, 'modal' => 'history']) }}" class="btn btn-primary open-history-modal">
                        <i class="fas fa-plus-circle mr-2"></i>Добавить
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon">
                        <div class="circle-icon">
                            <i class="far fa-file-alt"></i>
                        </div>
                        <div class="info">
                            <p class="histories-count">{{ $order->histories->count() }}</p>
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
            <table class="table table-hover" id="orderHistoriesTable" data-href="{{ route('admin.order.history.index', $order) }}" width="100%">
                <thead>
                <tr>
                    <th>Клиент</th>
                    <th>Дата</th>
                    <th>Пройдено</th>
                    <th>Осталось</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <script type="application/x-tmpl-mustache" class="template-order-histories-table-column-buyer">
            @include('main_admin.orders.item.tabs.columns.history.buyer')
        </script>
        <script type="application/x-tmpl-mustache" class="template-order-histories-table-column-date">
            @include('main_admin.orders.item.tabs.columns.history.date')
        </script>
        <script type="application/x-tmpl-mustache" class="template-order-histories-table-column-passed">
            @include('main_admin.orders.item.tabs.columns.history.passed')
        </script>
        <script type="application/x-tmpl-mustache" class="template-order-histories-table-column-remaining">
            @include('main_admin.orders.item.tabs.columns.history.remaining')
        </script>
    </div>
</div>