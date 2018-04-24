$(function () {
    let $orderFamiliesTable = $('#orderFamiliesTable');
    let mustacheTemplateOrderFamiliesTableColumnBuyer = $('.template-order-families-table-column-buyer').text();
    let mustacheTemplateOrderFamiliesTableColumnPassport = $('.template-order-families-table-column-passport').text();
    let mustacheTemplateOrderFamiliesTableColumnBirthday = $('.template-order-families-table-column-birthday').text();
    let mustacheTemplateOrderFamiliesTableColumnPhone = $('.template-order-families-table-column-phone').text();
    let mustacheTemplateOrderFamiliesTableColumnRadio = $('.template-order-families-table-column-radio').text();
    let mustacheTemplateOrderFamiliesTableColumnActions = $('.template-order-families-table-column-actions').text();

    $orderFamiliesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $orderFamiliesTable.data('href'),
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnBuyer, {buyer}),
            },
            {
                targets: 1,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnPassport, {buyer}),
            },
            {
                targets: 2,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnBirthday, {buyer}),
            },
            {
                targets: 3,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnPhone, {buyer}),
            },
            {
                targets: 4,
                orderable: false,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnActions, {buyer}),
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
            // $('.orders-count').text(settings.json.counters.orders_count);
            // $('.orders-paid').text(settings.json.counters.orders_paid);
        },
    });

    $(document).on('keyup', '.family-search', function (e) {
        if (e.keyCode == 13) {
            $('#orderFamiliesTable').DataTable().search(this.value).draw();
        }
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('click', '.open-family-modal', function (e) {
        e.preventDefault();
        let $this = $(this);
        if ($this.data('ajax')) {
            return;
        }
        let $divForModal = $('.div-for-modal');
        $this.data('ajax', $.ajax({
            url: $this.attr('href'),
            success: response => {
                $divForModal.html(response.view);
                let $modal = $('#family-modal');
                let $familiesTable = $('#orderFamiliesTableModal', $modal);
                $familiesTable.DataTable({
                    info: false,
                    autoWidth: false,
                    processing: true,
                    serverSide: true,
                    ajax:
                        {
                            url: $familiesTable.data('href'),
                        },
                    columnDefs: [
                        {
                            targets: 0,
                            render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnBuyer, {buyer}),
                        },
                        {
                            targets: 1,
                            render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnPassport, {buyer}),
                        },
                        {
                            targets: 2,
                            render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnPhone, {buyer}),
                        },
                        {
                            targets: 3,
                            orderable: false,
                            render: (data, type, buyer) => Mustache.render(mustacheTemplateOrderFamiliesTableColumnRadio, {buyer}),
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
                });
                $('.dataTables_length select', $modal).select2({
                    minimumResultsForSearch: Infinity,
                    width: 'auto'
                });
                $modal.modal('show');
                $modal.on('hidden.bs.modal', function (event) {
                    $divForModal.empty();
                });
            },
            error: xhr => {
                console.error(xhr);
            },
            complete: () => $this.removeData('ajax'),
        }));
    });

    $(document).on('keyup', '.family-search-modal', function (e) {
        if (e.keyCode == 13) {
            $('#orderFamiliesTableModal').DataTable().search(this.value).draw();
        }
    });

    $(document).on('submit', '.add-family-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#family-modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            complete: () => {
                $modal.modal('hide');
                $orderFamiliesTable.DataTable().ajax.reload();
                $form.removeData('ajax');
            },
        }));
    });

    $(document).on('click', '.order-family-delete', function (e) {
        e.preventDefault();
        let $this = $(this);
        swal({
            title: "Подтвердите удаление",
            text: "Вы хотите убрать данного клиента из абонемента?",
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        notifyService.showMessage('info', 'Успех!', response.message);
                        $orderFamiliesTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });
                swal("Удаление подтверждено!", "Клиент будет убран из данного абонемента.", "success");
            } else {
                swal("Удаление отменено!", "Клиент не будет убран из данного абонемента.", "error");
            }
        });
    });
});