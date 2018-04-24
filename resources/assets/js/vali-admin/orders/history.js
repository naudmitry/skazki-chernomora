$(function () {
    let mustacheTemplateOrderFamiliesTableColumnBuyer = $('.template-order-families-table-column-buyer').text();
    let mustacheTemplateOrderFamiliesTableColumnPassport = $('.template-order-families-table-column-passport').text();
    let mustacheTemplateOrderFamiliesTableColumnPhone = $('.template-order-families-table-column-phone').text();
    let mustacheTemplateOrderFamiliesTableColumnRadio = $('.template-order-families-table-column-radio').text();

    $(document).on('click', '.open-history-modal', function (e) {
        e.preventDefault();
        let $this = $(this);
        if ($this.data('ajax')) {
            return;
        }
        let $divForModal = $('.div-for-modal');
        $this.data('ajax', $.ajax({
            url: $('#history').data('open-modal'),
            success: response => {
                $divForModal.html(response.view);
                let $modal = $('#history-modal');
                let $table = $('#orderHistoriesTableModal', $modal);
                $table.DataTable({
                    info: false,
                    autoWidth: false,
                    processing: true,
                    serverSide: true,
                    ajax:
                        {
                            url: $table.data('href'),
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

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.history-search-modal', function (e) {
        if (e.keyCode == 13) {
            $('#orderHistoriesTableModal').DataTable().search(this.value).draw();
        }
    });

    $(document).on('submit', '.add-history-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#history-modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            complete: () => {
                $modal.modal('hide');
                $('#historiesTable').DataTable().ajax.reload();
                $form.removeData('ajax');
            },
        }));
    });
});