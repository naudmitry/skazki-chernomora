<div class="tab-pane" id="history" data-open-modal="{{ route('admin.order.open-modal', [$order, 'history']) }}">
    @include('main_admin.histories.index', [
        'object' => $order,
        'type' => \App\Classes\TypeHistoryEnum::ORDER,
        'columnName' => 'Клиент',
    ])
</div>