$(function () {
    let $companiesLists = $('.companies-lists');

    if (!$companiesLists.length) {
        return;
    }

    let $companiesListsTable = $('#companiesListsTable');
    let mustacheTemplateCompaniesListsTableColumnCreated = $('.template-companies-lists-table-column-created').text();
    let mustacheTemplateCompaniesListsTableColumnTitle = $('.template-companies-lists-table-column-title').text();
    let mustacheTemplateCompaniesListsTableColumnSites = $('.template-companies-lists-table-column-sites').text();
    let mustacheTemplateCompaniesListsTableColumnAdmin = $('.template-companies-lists-table-column-admin').text();
    let mustacheTemplateCompaniesListsTableColumnCountry = $('.template-companies-lists-table-column-country').text();
    let mustacheTemplateCompaniesListsTableColumnAmount = $('.template-companies-lists-table-column-amount').text();
    let mustacheTemplateCompaniesListsTableColumnEnable = $('.template-companies-lists-table-column-enable').text();
    let mustacheTemplateCompaniesListsTableColumnActions = $('.template-companies-lists-table-column-actions').text();

    $companiesListsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $companiesListsTable.data('href'),
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
                render: (data, type, company) => Mustache.render(mustacheTemplateCompaniesListsTableColumnCreated, {company}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, company) => Mustache.render(mustacheTemplateCompaniesListsTableColumnTitle, {company}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, company) => Mustache.render(mustacheTemplateCompaniesListsTableColumnSites, {company}),
            },
            {
                targets: 3,
                sortable: false,
                render: (data, type, company) => Mustache.render(mustacheTemplateCompaniesListsTableColumnAdmin, {company}),
            },
            {
                targets: 4,
                sortable: false,
                render: (data, type, company) => Mustache.render(mustacheTemplateCompaniesListsTableColumnCountry, {company}),
            },
            {
                targets: 5,
                data: 'author_id',
                render: (data, type, company) => Mustache.render(mustacheTemplateCompaniesListsTableColumnAmount, {company}),
            },
            {
                targets: 6,
                data: 'enable',
                render: (data, type, company) => Mustache.render(mustacheTemplateCompaniesListsTableColumnEnable, {company}),
            },
            {
                targets: 7,
                orderable: false,
                render: (data, type, company) => Mustache.render(mustacheTemplateCompaniesListsTableColumnActions, {company}),
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
            $('.amount-total').text(settings.json.amount_total);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#companiesListsTable').DataTable().search(this.value).draw();
        }
    });
});
