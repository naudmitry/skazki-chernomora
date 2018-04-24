$(function () {
    let $subscriptions = $('.subscriptions');

    if (!$subscriptions.length) {
        return;
    }

    let $subscriptionsTable = $('#subscriptionsTable');
    let mustacheTemplateSubscriptionsTableColumnActions = $('.template-subscriptions-table-column-actions').text();
    let mustacheTemplateSubscriptionsTableColumnCreated = $('.template-subscriptions-table-column-created').text();
    let mustacheTemplateSubscriptionsTableColumnEnabled = $('.template-subscriptions-table-column-enabled').text();
    let mustacheTemplateSubscriptionsTableColumnTitle = $('.template-subscriptions-table-column-title').text();
    let mustacheTemplateSubscriptionsTableColumnAuthor = $('.template-subscriptions-table-column-author').text();

    $subscriptionsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $subscriptionsTable.data('href'),
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
                render: (data, type, subscription) => Mustache.render(mustacheTemplateSubscriptionsTableColumnCreated, {subscription}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, subscription) => Mustache.render(mustacheTemplateSubscriptionsTableColumnTitle, {subscription}),
            },
            {
                targets: 2,
                render: (data, type, subscription) => Mustache.render(mustacheTemplateSubscriptionsTableColumnAuthor, {subscription}),
            },
            {
                targets: 3,
                data: 'is_enabled',
                render: (data, type, subscription) => Mustache.render(mustacheTemplateSubscriptionsTableColumnEnabled.replace(/@subscriptionId/g, subscription.id), {subscription}),
            },
            {
                targets: 4,
                orderable: false,
                render: (data, type, subscription) => Mustache.render(mustacheTemplateSubscriptionsTableColumnActions.replace(/@subscriptionId/g, subscription.id), {subscription}),
            },
        ],
        order: [[1, 'asc']],
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
            $('.count').text(settings.json.counters.count);
            $('.enabled-count').text(settings.json.counters.enabled_count);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#subscriptionsTable').DataTable().search(this.value).draw();
        }
    });

    $(document).on('change', '.subscription-enabled', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'post',
            success: (response) => {
                notifyService.showMessage('info', 'Успех!', response.message);
                $subscriptionsTable.DataTable().ajax.reload();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('click', '.item-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить абонемент?",
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
                        $subscriptionsTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Абонемент будет удален.", "success");
            } else {
                swal("Удаление отменено!", "Абонемент не будет удален.", "error");
            }
        });
    });

    $(document).on('click', '.open-edit-modal', function (e) {
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
                let $modal = $('#subscription-modal');
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

    $(document).on('submit', '.subscription-edit-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#subscription-modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.find('.has-error').removeClass('has-error');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                $subscriptionsTable.DataTable().ajax.reload();
                $modal.modal('hide');
            },
            error: xhr => {
                if ('object' === typeof xhr.responseJSON) {
                    for (let key in xhr.responseJSON['errors']) {
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
});
