$(function () {
    let $historiesTable = $('#historiesTable');
    let mustacheTemplateHistoriesTableColumnCreatedAt = $('.template-histories-table-column-created').text();
    let mustacheTemplateHistoriesTableColumnAuthor = $('.template-histories-table-column-author').text();
    let mustacheTemplateHistoriesTableColumnEvent = $('.template-histories-table-column-event').text();
    let mustacheTemplateHistoriesTableColumnObject = $('.template-histories-table-column-object').text();

    $historiesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $historiesTable.data('href'),
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, history) => Mustache.render(mustacheTemplateHistoriesTableColumnCreatedAt, {history}),
            },
            {
                targets: 1,
                render: (data, type, history) => Mustache.render(mustacheTemplateHistoriesTableColumnObject, {history}),
            },
            {
                targets: 2,
                render: (data, type, history) => Mustache.render(mustacheTemplateHistoriesTableColumnAuthor, {history}),
            },
            {
                targets: 3,
                render: (data, type, history) => Mustache.render(mustacheTemplateHistoriesTableColumnEvent, {history}),
            },
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
            $('.histories-count').text(settings.json.counters.count);
            // $('.orders-paid').text(settings.json.counters.orders_paid);
        },
    });

    $(document).on('keyup', '.history-search', function (e) {
        if (e.keyCode == 13) {
            $('#historiesTable').DataTable().search(this.value).draw();
        }
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
});