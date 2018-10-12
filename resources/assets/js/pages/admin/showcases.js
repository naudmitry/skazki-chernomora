$(function () {
    let $showcases = $('.showcases');

    if (!$showcases.length) {
        return;
    }

    let $showcasesTable = $('#showcasesTable');
    let mustacheTemplateShowcasesTableColumnCreated = $('.template-showcases-table-column-created').text();
    let mustacheTemplateShowcasesTableColumnTitle = $('.template-showcases-table-column-title').text();
    let mustacheTemplateShowcasesTableColumnWebAddress = $('.template-showcases-table-column-web-address').text();
    let mustacheTemplateShowcasesTableColumnEnable = $('.template-showcases-table-column-enable').text();
    let mustacheTemplateShowcasesTableColumnActions = $('.template-showcases-table-column-actions').text();

    $showcasesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $showcasesTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                data: 'created_at',
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnCreated, {showcase}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnTitle, {showcase}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnWebAddress, {showcase}),
            },
            {
                targets: 3,
                data: 'enable',
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnEnable, {showcase}),
            },
            {
                targets: 4,
                orderable: false,
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnActions, {showcase}),
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
            $('.sites-count').text(settings.json.sites_count);
            // $('.amount-total').text(settings.json.amount_total);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#showcasesTable').DataTable().search(this.value).draw();
        }
    });
});
