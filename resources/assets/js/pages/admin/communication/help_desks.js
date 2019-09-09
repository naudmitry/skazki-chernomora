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
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnStatus, {helpdesk}),
            },
            {
                targets: 6,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnUpdated, {helpdesk}),
            },
            {
                targets: 7,
                orderable: false,
                render: (data, type, helpdesk) => Mustache.render(mustacheTemplateHelpDeskTableColumnActions, {helpdesk}),
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
            $('.helpdesk-status-new').text(settings.json.counters.helpdesk_status_new);
            $('.helpdesk-status-completed').text(settings.json.counters.helpdesk_status_completed);
            $('.helpdesk-status-total').text(settings.json.counters.helpdesk_status_total);
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

    $(document).on('click', '.help-desks-destroy', function (e) {
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
                        notifyService.showMessage('success', 'Успех!', response.message);
                        $helpDeskTable.DataTable().ajax.reload();
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

    $(document).on('click', '.help-desks-update-modal', function (e) {
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
                let $modal = $('#help-desks-modal');
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

    $(document).on('change keyup', '.help-desks-edit-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);
        if (!$input.is('input,select,textarea')) {
            return;
        }
        $form.find('[type=submit]')
            .removeClass('btn-default')
            .addClass('btn-primary')
            .prop('disabled', false);
    });

    $(document).on('submit', '.help-desks-edit-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#help-desks-modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                $helpDeskTable.DataTable().ajax.reload();
                $modal.modal('hide');
                notifyService.showMessage('success', 'Успех!', response.message);
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
