{{--TODO: переместить в family (т.е. создать папку и переместить всё, что связано с семьёй в новую папку)--}}

<div class="tab-pane" id="family">
    <div class="tile">
        <div class="tile-body mb-4">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <a href="{{ route('admin.order.open-modal', ['order' => $order->id, 'modal' => 'family']) }}"
                       class="btn btn-primary open-family-modal"><i class="fas fa-plus-circle mr-2"></i>Добавить</a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon">
                        <div class="circle-icon">
                            <i class="far fa-file-alt"></i>
                        </div>
                        <div class="info">
                            <p class="orders-count"><b>{{ $order->buyers->count() }}</b></p>
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
                            <p class="orders-paid"><b>0</b></p>
                            <p>оплаченных</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-2">
                    <input class="form-control form-control-sm family-search" placeholder="Введите и нажмите Enter..."/>
                </div>
            </div>
        </div>

        <div class="tile-body datatable-scroll-lg">
            <table class="table table-hover" id="orderFamiliesTable"
                   data-href="{{ route('admin.order.family.index', $order) }}" width="100%">
                <thead>
                <tr>
                    <th>Клиент</th>
                    <th>Паспортные данные</th>
                    <th>День рождения</th>
                    <th>Номер телефона</th>
                    <th></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <script type="application/x-tmpl-mustache" class="template-order-families-table-column-buyer">
            @include('main_admin.orders.item.tabs.columns.family.buyer')
        </script>
        <script type="application/x-tmpl-mustache" class="template-order-families-table-column-passport">
            @include('main_admin.orders.item.tabs.columns.family.passport')
        </script>
        <script type="application/x-tmpl-mustache" class="template-order-families-table-column-birthday">
            @include('main_admin.orders.item.tabs.columns.family.birthday')
        </script>
        <script type="application/x-tmpl-mustache" class="template-order-families-table-column-phone">
            @include('main_admin.orders.item.tabs.columns.family.phone')
        </script>
        <script type="application/x-tmpl-mustache" class="template-order-families-table-column-radio">
            @include('main_admin.orders.item.tabs.columns.family.radio')
        </script>
        <script type="application/x-tmpl-mustache" class="template-order-families-table-column-actions">
            @include('main_admin.orders.item.tabs.columns.family.actions')
        </script>
    </div>
</div>