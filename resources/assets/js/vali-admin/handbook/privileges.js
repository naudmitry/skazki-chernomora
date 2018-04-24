$(function () {
    let $privilegesTable = $('#privilegesTable');

    if (!$privilegesTable.length) {
        return;
    }

    let mustacheTemplatePrivilegesTableColumnActions = $('.template-privileges-table-column-actions').text();
    let mustacheTemplatePrivilegesTableColumnCreated = $('.template-privileges-table-column-created').text();
    let mustacheTemplatePrivilegesTableColumnEnabled = $('.template-privileges-table-column-enabled').text();
    let mustacheTemplatePrivilegesTableColumnTitle = $('.template-privileges-table-column-title').text();
    let mustacheTemplatePrivilegesTableColumnAuthor = $('.template-privileges-table-column-author').text();

    $privilegesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ordering: false,
        ajax:
            {
                url: $privilegesTable.data('href'),
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
                render: (data, type, privilege) => Mustache.render(mustacheTemplatePrivilegesTableColumnCreated, {privilege}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, privilege) => Mustache.render(mustacheTemplatePrivilegesTableColumnTitle, {privilege}),
            },
            {
                targets: 2,
                render: (data, type, privilege) => Mustache.render(mustacheTemplatePrivilegesTableColumnAuthor, {privilege}),
            },
            {
                targets: 3,
                data: 'is_enabled',
                render: (data, type, privilege) => Mustache.render(mustacheTemplatePrivilegesTableColumnEnabled.replace(/@privilegeId/g, privilege.id), {privilege}),
            },
            {
                targets: 4,
                orderable: false,
                render: (data, type, privilege) => Mustache.render(mustacheTemplatePrivilegesTableColumnActions.replace(/@privilegeId/g, privilege.id), {privilege}),
            },
        ],
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
            $('#privilegesTable').DataTable().search(this.value).draw();
        }
    });

    $(document).on('change', '.item-enable', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'post',
            success: (response) => {
                notifyService.showMessage('info', 'Успех!', response.message);
                $privilegesTable.DataTable().ajax.reload();
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
                        notifyService.showMessage('info', 'Успех!', response.message);
                        $privilegesTable.DataTable().ajax.reload();
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
                let $modal = $('#privilege-modal');
                console.log(123);
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

    $(document).on('submit', '.privilege-edit-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#privilege-modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.find('.has-error').removeClass('has-error');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                $privilegesTable.DataTable().ajax.reload();
                $modal.modal('hide');
                notifyService.showMessage('info', 'Успех!', response.message);
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
