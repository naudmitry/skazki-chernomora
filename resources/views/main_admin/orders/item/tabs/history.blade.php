<div class="tab-pane" id="history">
    @include('main_admin.histories.index', [
        'object' => $order,
        'type' => \App\Classes\TypeHistoryEnum::ORDER,
        'columnName' => 'Клиент',
    ])
</div>