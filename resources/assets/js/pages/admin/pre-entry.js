$(function () {
    let $preEntries = $('.pre-entries');

    if (!$preEntries.length) {
        return;
    }

    let $preEntriesTable = $('#preEntryTable');
    let mustacheTemplatePreEntriesTableColumnCreated = $('.template-pre-entries-table-column-created').text();
    let mustacheTemplatePreEntriesTableColumnName = $('.template-pre-entries-table-column-name').text();
    let mustacheTemplatePreEntriesTableColumnPhone = $('.template-pre-entries-table-column-phone').text();
    let mustacheTemplatePreEntriesTableColumnEmail = $('.template-pre-entries-table-column-email').text();
    let mustacheTemplatePreEntriesTableColumnDate = $('.template-pre-entries-table-column-date').text();
    let mustacheTemplatePreEntriesTableColumnSaltCave = $('.template-pre-entries-table-column-salt-cave').text();
    let mustacheTemplatePreEntriesTableColumnType = $('.template-pre-entries-table-column-type').text();
    let mustacheTemplatePreEntriesTableColumnMessage = $('.template-pre-entries-table-column-message').text();
    let mustacheTemplatePreEntriesTableColumnActions = $('.template-pre-entries-table-column-actions').text();

    $preEntriesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $preEntriesTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnCreated, {preEntry}),
                width: '10%',
            },
            {
                targets: 1,
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnName, {preEntry}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnPhone, {preEntry}),
            },
            {
                targets: 3,
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnEmail, {preEntry}),
            },
            {
                targets: 4,
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnDate, {preEntry}),
            },
            {
                targets: 5,
                sortable: false,
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnSaltCave, {preEntry}),
            },
            {
                targets: 6,
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnType, {preEntry}),
            },
            {
                targets: 7,
                sortable: false,
                width: '20%',
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnMessage, {preEntry}),
            },
            {
                targets: 8,
                orderable: false,
                render: (data, type, preEntry) => Mustache.render(mustacheTemplatePreEntriesTableColumnActions, {preEntry}),
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

    $(document).on('click', '.pre-entry-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить запись?",
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        notifyService.showMessage('danger', 'Успех!', response.message);
                        $preEntriesTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Запись будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Запись не будет удалена.", "error");
            }
        });
    });
});
