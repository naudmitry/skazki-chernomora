$(function () {
    let $communicationHelpDesk = $('.communication-helpdesk');

    if (!$communicationHelpDesk.length) {
        return;
    }

    let $helpDeskTable = $('#helpDeskTable');
    let mustacheTemplateHelpDeskTableColumnCreated = $('.template-helpdesk-table-column-created').text();
    let mustacheTemplateHelpDeskTableColumnSurname = $('.template-helpdesk-table-column-surname').text();
    let mustacheTemplateHelpDeskTableColumnName = $('.template-helpdesk-table-column-name').text();
    let mustacheTemplateHelpDeskTableColumnEmail = $('.template-helpdesk-table-column-email').text();
    let mustacheTemplateHelpDeskTableColumnPhone = $('.template-helpdesk-table-column-phone').text();
    let mustacheTemplateHelpDeskTableColumnMessage = $('.template-helpdesk-table-column-message').text();
    let mustacheTemplateHelpDeskTableColumnStatus = $('.template-helpdesk-table-column-status').text();
    let mustacheTemplateHelpDeskTableColumnUpdated = $('.template-helpdesk-table-column-updated').text();
    let mustacheTemplateHelpDeskTableColumnActions = $('.template-helpdesk-table-column-actions').text();

    $helpDeskTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $helpDeskTable.data('href'),
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
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnCreated, {helpdesk}),
            },
            {
                targets: 1,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnSurname, {helpdesk}),
            },
            {
                targets: 2,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnName, {helpdesk}),
            },
            {
                targets: 3,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnEmail, {helpdesk}),
            },
            {
                targets: 4,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnPhone, {helpdesk}),
            },
            {
                targets: 5,
                sortable: false,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnMessage, {helpdesk}),
            },
            {
                targets: 6,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnStatus, {helpdesk}),
            },
            {
                targets: 7,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnUpdated, {helpdesk}),
            },
            {
                targets: 8,
                orderable: false,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnActions, {helpdesk}),
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
            $('.helpdesk-status-new').text(settings.json.counters.helpdesk_status_new);
            $('.helpdesk-status-completed').text(settings.json.counters.helpdesk_status_completed);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#blogArticlesTable').DataTable().search(this.value).draw();
        }
    });
});
