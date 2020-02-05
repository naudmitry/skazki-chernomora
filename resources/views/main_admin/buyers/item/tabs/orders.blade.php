<div class="tab-pane fade" id="orders">
    @include('main_admin.orders.lists.table', [
        'indexRoute' => route('admin.orders.index', ['buyer_id' => $buyer->id]),
        'createRoute' => route('admin.orders.create', ['buyer_id' => $buyer->id])
    ])
</div>