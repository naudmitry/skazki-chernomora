$(function () {
    let $saltCaves = $('.salt-caves');

    if (!$saltCaves.length) {
        return;
    }

    let $saltCavesTable = $('#saltCavesTable');
    let mustacheTemplateSaltCavesTableColumnActions = $('.template-salt-caves-table-column-actions').text();
    let mustacheTemplateSaltCavesTableColumnCreated = $('.template-salt-caves-table-column-created').text();
    let mustacheTemplateSaltCavesTableColumnTitle = $('.template-salt-caves-table-column-title').text();
    let mustacheTemplateSaltCavesTableColumnAddress = $('.template-salt-caves-table-column-address').text();
    let mustacheTemplateSaltCavesTableColumnPhoneNumbers = $('.template-salt-caves-table-column-phone-numbers').text();
    let mustacheTemplateSaltCavesTableColumnEnabled = $('.template-salt-caves-table-column-enabled').text();

    $saltCavesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $saltCavesTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnCreated, {cave}),
            },
            {
                targets: 1,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnTitle, {cave}),
            },
            {
                targets: 2,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnAddress, {cave}),
            },
            {
                targets: 3,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnPhoneNumbers, {cave}),
            },
            {
                targets: 4,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnEnabled, {cave}),
            },
            {
                targets: 5,
                orderable: false,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnActions, {cave}),
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
            // $('.enable-news-count').text(settings.json.counters.enable_news_count);
            // $('.view-count-total').text(settings.json.counters.view_count_total);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#buyersListsTable').DataTable().search(this.value).draw();
        }
    });
});
