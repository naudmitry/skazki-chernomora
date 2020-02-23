<div class="tile payments-list">
    <div class="tile-body mb-4">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus-circle mr-2"></i>Добавить
                </a>
            </div>
        </div>
    </div>

    <div class="tile-body datatable-scroll-lg">
        <table class="table table-hover" id="paymentsTable"
               data-href="{{ route('admin.orders.payments.index', $order) }}">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Задолженность</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script type="application/x-tmpl-mustache" class="template-payments-table-column-amount">
        @include('main_admin.orders.payments.columns.amount')
    </script>
    <script type="application/x-tmpl-mustache" class="template-payments-table-column-date">
        @include('main_admin.orders.payments.columns.date')
    </script>
    <script type="application/x-tmpl-mustache" class="template-payments-table-column-debt">
        @include('main_admin.orders.payments.columns.debt')
    </script>
</div>