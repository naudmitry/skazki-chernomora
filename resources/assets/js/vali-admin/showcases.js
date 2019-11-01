$(function () {
    let $showcases = $('.showcases');

    if (!$showcases.length) {
        return;
    }

    let $showcasesTable = $('#showcasesTable');
    let mustacheTemplateShowcasesTableColumnCreated = $('.template-showcases-table-column-created').text();
    let mustacheTemplateShowcasesTableColumnTitle = $('.template-showcases-table-column-title').text();
    let mustacheTemplateShowcasesTableColumnWebAddress = $('.template-showcases-table-column-web-address').text();
    let mustacheTemplateShowcasesTableColumnEnable = $('.template-showcases-table-column-enable').text();
    let mustacheTemplateShowcasesTableColumnActions = $('.template-showcases-table-column-actions').text();

    $showcasesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $showcasesTable.data('href'),
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
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnCreated, {showcase}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnTitle, {showcase}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnWebAddress, {showcase}),
            },
            {
                targets: 3,
                data: 'enable',
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnEnable, {showcase}),
            },
            {
                targets: 4,
                orderable: false,
                render: (data, type, showcase) => Mustache.render(mustacheTemplateShowcasesTableColumnActions, {showcase}),
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
            $('.sites-enable').text(settings.json.sites_enable);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#showcasesTable').DataTable().search(this.value).draw();
        }
    });

    $(document).on('change', '.showcase-enable-checkbox', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'post',
            success: (response) => {
                notifyService.showMessage('info', 'Успех!', response.message);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('click', '.open-showcase-add-modal', function (e) {
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
                let $modal = $('#modal-add-showcase');
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

    $(document).on('submit', '.showcase-add-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#modal-add-showcase');
        if ($form.data('ajax')) {
            return;
        }
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                $showcasesTable.DataTable().ajax.reload();
                $modal.modal('hide');
                notifyService.showMessage('info', 'topRight', response.message);
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
                $form.find('[type=submit]')
                    .removeClass('btn-primary')
                    .addClass('btn-default')
                    .prop('disabled', true);
            },
        }));
    });

    $(document).on('input', '.showcase-add-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);
        if (!$input.is('input,select')) {
            return;
        }
        if ((e.type == 'keyup') && ($input.attr('type') != 'text')) {
            return;
        }
        $form.find('[type=submit]')
            .removeClass('btn-default')
            .addClass('btn-primary')
            .prop('disabled', false);
    });
});
