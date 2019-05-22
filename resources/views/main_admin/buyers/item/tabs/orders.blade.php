<div class="tab-pane fade" id="orders">
    <div class="tile user-settings">
        <div class="tile-body datatable-scroll-lg">
            <table class="table table-hover" id="orderListsTable" data-href="{{ route('admin.order.list.index') }}" width="100%">
                <thead>
                <tr>
                    <th>Создан</th>
                    <th>Номер</th>
                    <th>Дата начала/окончания</th>
                    <th>Сеансов</th>
                    <th>Соляная пещера</th>
                    <th>Стоимость</th>
                    <th>Оплачено</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->created_at }}</td>
                            <td><a href="{{ route('admin.order.edit', $order) }}">{{ $order->number }}</a></td>
                            <td><div>{{ $order->begin_at }}</div>{{ $order->end_at }}</td>
                            <td>{{ $order->amount_sessions }}</td>
                            <td>{{ $order->saltCave->title }}</td>
                            <td>{{ $order->cost }}</td>
                            <td>{{ $order->paid }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>