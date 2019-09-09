$(function () {
    let $ordersApplications = $('.orders-applications');

    if (!$ordersApplications.length) {
        return;
    }

    let $ordersApplicationsTable = $('#ordersApplicationsTable');
    let mustacheTemplateApplicationTableColumnCreated = $('.template-application-table-column-created').text();
    let mustacheTemplateApplicationTableColumnName = $('.template-application-table-column-name').text();
    let mustacheTemplateApplicationTableColumnEmail = $('.template-application-table-column-email').text();
    let mustacheTemplateApplicationTableColumnPhone = $('.template-application-table-column-phone').text();
    let mustacheTemplateApplicationTableColumnCountry = $('.template-application-table-column-country').text();
    let mustacheTemplateApplicationTableColumnSurname = $('.template-application-table-column-surname').text();
    let mustacheTemplateApplicationTableColumnProcess = $('.template-application-table-column-process').text();
    let mustacheTemplateApplicationTableColumnActions = $('.template-application-table-column-actions').text();

    $ordersApplicationsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $ordersApplicationsTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, application) => Mustache.render(mustacheTemplateApplicationTableColumnCreated, {application}),
            },
            {
                targets: 1,
                render: (data, type, application) => Mustache.render(mustacheTemplateApplicationTableColumnName, {application}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, application) => Mustache.render(mustacheTemplateApplicationTableColumnSurname, {application}),
            },
            {
                targets: 3,
                sortable: false,
                render: (data, type, application) => Mustache.render(mustacheTemplateApplicationTableColumnEmail, {application}),
            },
            {
                targets: 4,
                render: (data, type, application) => Mustache.render(mustacheTemplateApplicationTableColumnPhone, {application}),
            },
            {
                targets: 5,
                render: (data, type, application) => Mustache.render(mustacheTemplateApplicationTableColumnCountry, {application}),
            },
            {
                targets: 6,
                render: (data, type, application) => Mustache.render(mustacheTemplateApplicationTableColumnProcess, {application}),
            },
            {
                targets: 7,
                orderable: false,
                render: (data, type, application) => Mustache.render(mustacheTemplateApplicationTableColumnActions, {application}),
            },
        ],
        order: [[0, 'desc']],
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
            $('#ordersApplicationsTable').DataTable().search(this.value).draw();
        }
    });
});