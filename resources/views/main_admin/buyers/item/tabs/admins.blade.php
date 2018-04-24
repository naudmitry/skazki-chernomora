<div class="tab-pane fade" id="admins">
    @include('main_admin.histories.index', [
        'object' => $buyer,
        'type' => \App\Classes\TypeHistoryEnum::BUYER,
        'columnName' => 'Администратор',
    ])
</div>