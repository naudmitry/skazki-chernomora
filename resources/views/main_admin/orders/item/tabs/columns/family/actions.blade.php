<div class="btn-group">
    <a
        href="{{ route('admin.order.family.delete', ['order' => $order->id, 'buyer' => '']) }}/@{{buyer.id}}"
        class="btn btn-primary order-family-delete"
    ><i class="fas fa-trash"></i></a>
</div>