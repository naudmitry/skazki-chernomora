<div class="tab-pane fade" id="orders">
    @include('main_admin.orders.lists.table', [
        'indexRoute' => route('admin.order.list.index', ['buyer_id' => $buyer->id]),
        'createRoute' => route('admin.order.create', ['buyer_id' => $buyer->id])
    ])
</div>