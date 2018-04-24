$(function () {
    let $paymentsList = $('.payments-list');

    if (!$paymentsList.length) {
        return;
    }

    let $paymentsTable = $('#paymentsTable');

    let mustacheTemplatePaymentsTableColumnAmount = $('.template-payments-table-column-amount').text();
    let mustacheTemplatePaymentsTableColumnDate = $('.template-payments-table-column-date').text();
    let mustacheTemplatePaymentsTableColumnDebt = $('.template-payments-table-column-debt').text();
    let mustacheTemplatePaymentsTableColumnType = $('.template-payments-table-column-type').text();

    $paymentsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $paymentsTable.data('href'),
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, payment) => Mustache.render(mustacheTemplatePaymentsTableColumnDate, {payment}),
            },
            {
                targets: 1,
                render: (data, type, payment) => Mustache.render(mustacheTemplatePaymentsTableColumnAmount, {payment}),
            },
            {
                targets: 2,
                render: (data, type, payment) => Mustache.render(mustacheTemplatePaymentsTableColumnDebt, {payment}),
            },
            {
                targets: 3,
                render: (data, type, payment) => Mustache.render(mustacheTemplatePaymentsTableColumnType, {payment}),
            }
        ],
        order: [[0, 'asc']],
        dom: '<"datatable-scroll-lg"t><"datatable-footer"ilp>',
        language: {
            processing: "Подождите...",
            search: "Поиск:",
            lengthMenu: "Показать: _MENU_",
            info: "Записи с _START_ до _END_ из _TOTAL_ записей",
            infoEmpty: "Записи с 0 до 0 из 0 записей",
            infoFiltered: "(отфильтровано из _MAX_ записей)",
            infoPostFix: "",
            loadingRecords: "Загрузка записей...",
            zeroRecords: "Записи отсутствуют.",
            emptyTable: "В таблице отсутствуют данные",
            paginate: {
                previous: "←",
                next: "→",
            }
        },
        lengthMenu: [15, 25, 50, 75, 100],
        displayLength: 15,
        drawCallback: function (settings) {
            // $('.orders-count').text(settings.json.counters.orders_count);
            // $('.orders-paid').text(settings.json.counters.orders_paid);
        },
    });

    $('.dataTables_length select', $paymentsList).select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
});