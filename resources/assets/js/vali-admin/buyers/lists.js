$(function () {
    let $buyersListsTable = $('#buyersListsTable');

    if (!$buyersListsTable.length) {
        return;
    }

    let mustacheTemplateBuyersListsTableColumnActions = $('.template-buyers-lists-table-column-actions').text();
    let mustacheTemplateBuyersListsTableColumnPhone = $('.template-buyers-lists-table-column-phone').text();
    let mustacheTemplateBuyersListsTableColumnStatus = $('.template-buyers-lists-table-column-status').text();
    let mustacheTemplateBuyersListsTableColumnLogin = $('.template-buyers-lists-table-column-login').text();
    let mustacheTemplateBuyersListsTableColumnUser = $('.template-buyers-lists-table-column-user').text();
    let mustacheTemplateBuyersListsTableColumnCreated = $('.template-buyers-lists-table-column-created').text();

    $buyersListsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $buyersListsTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnCreated, {buyer}),
            },
            {
                targets: 1,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnUser, {buyer}),
            },
            {
                targets: 2,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnPhone, {buyer}),
            },
            {
                targets: 3,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnLogin, {buyer}),
            },
            {
                targets: 4,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnStatus, {buyer}),
            },
            {
                targets: 5,
                orderable: false,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnActions.replace('@buyerId', buyer.id), {buyer}),
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

    $(document).on('click', '.buyer-list-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить данные клиента?",
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
                        $buyersListsTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Клиент будет удален.", "success");
            } else {
                swal("Удаление отменено!", "Клиент не будет удален.", "error");
            }
        });
    });

    $(document).on('submit', '.buyer-create-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        let $modal = $form.closest('#buyer-modal');
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                if (response.status === 200) {
                    $buyersListsTable.DataTable().ajax.reload();
                    $modal.modal('hide');
                }
            },
            error: xhr => {
                if ('object' === typeof xhr.responseJSON) {
                    for (let key in xhr.responseJSON.errors) {
                        $form.find('[name="' + key + '"]').addClass('is-invalid');
                    }
                    return;
                }
                console.error(xhr);
            },
            complete: () => {
                $form.removeData('ajax');
            },
        }));
    });

    $(document).on('click', '.open-buyer-modal', function (e) {
        e.preventDefault();
        let $this = $(this);
        if ($this.data('ajax')) {
            return;
        }
        let $divForModal = $('.div-for-modal');
        $this.data('ajax', $.ajax({
            url: $this.data('href'),
            success: response => {
                $divForModal.html(response.view);
                let $modal = $('#buyer-modal');
                $modal.find('.select2').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
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

    $(document).on('change keyup', '.buyer-create-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);
        if (!$input.is('input,select')) {
            return;
        }
        $form.find('[type=submit]')
            .removeClass('btn-default')
            .addClass('btn-primary')
            .prop('disabled', false);
    });
});
