<div>
    <a href="{{ route('admin.buyers.edit', '@buyerId') }}">@{{order.buyer.full_name}}</a>
</div>
<a href="{{ route('admin.orders.edit', '@orderId') }}">@{{order.number}}</a>
