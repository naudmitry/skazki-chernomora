$(function () {
    let $organizations = $('.organizations');

    if (!$organizations.length) {
        return;
    }

    let $organizationsTable = $('#organizationsTable');
    let mustacheTemplateOrganizationsTableColumnActions = $('.template-organizations-table-column-actions').text();
    let mustacheTemplateOrganizationsTableColumnCreated = $('.template-organizations-table-column-created').text();
    let mustacheTemplateOrganizationsTableColumnAddress = $('.template-organizations-table-column-address').text();
    let mustacheTemplateOrganizationsTableColumnTitle = $('.template-organizations-table-column-title').text();
    let mustacheTemplateOrganizationsTableColumnAuthor = $('.template-organizations-table-column-author').text();

    $organizationsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $organizationsTable.data('href'),
                // data: function (data) {
                //     // $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //     //     data[filter.name] = filter.value;
                //     // });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, organization) => Mustache.render(mustacheTemplateOrganizationsTableColumnCreated, {organization}),
            },
            {
                targets: 1,
                render: (data, type, organization) => Mustache.render(mustacheTemplateOrganizationsTableColumnTitle, {organization}),
            },
            {
                targets: 2,
                render: (data, type, organization) => Mustache.render(mustacheTemplateOrganizationsTableColumnAuthor, {organization}),
            },
            {
                targets: 3,
                render: (data, type, organization) => Mustache.render(mustacheTemplateOrganizationsTableColumnAddress, {organization}),
            },
            {
                targets: 4,
                orderable: false,
                render: (data, type, organization) => Mustache.render(mustacheTemplateOrganizationsTableColumnActions, {organization}),
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
            $('#organizationsTable').DataTable().search(this.value).draw();
        }
    });

    $(document).on('change', '.organization-enabled', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'post',
            success: (response) => {
                notifyService.showMessage('info', 'Успех!', response.message);
                $organizationsTable.DataTable().ajax.reload();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('click', '.organization-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить организацию?",
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
                        $organizationsTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Организация будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Органиация не будет удалена.", "error");
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
                let $modal = $('#organization-modal');
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

    $(document).on('submit', '.organization-edit-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#organization-modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.find('.has-error').removeClass('has-error');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                $organizationsTable.DataTable().ajax.reload();
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

    $(document).on('change keyup', '.organization-edit-form', function (e) {
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
