$(function () {
    let $saltCaves = $('.salt-caves');

    if (!$saltCaves.length) {
        return;
    }

    let $saltCavesTable = $('#saltCavesTable');
    let mustacheTemplateSaltCavesTableColumnActions = $('.template-salt-caves-table-column-actions').text();
    let mustacheTemplateSaltCavesTableColumnCreated = $('.template-salt-caves-table-column-created').text();
    let mustacheTemplateSaltCavesTableColumnTitle = $('.template-salt-caves-table-column-title').text();
    let mustacheTemplateSaltCavesTableColumnAddress = $('.template-salt-caves-table-column-address').text();
    let mustacheTemplateSaltCavesTableColumnPhoneNumbers = $('.template-salt-caves-table-column-phone-numbers').text();
    let mustacheTemplateSaltCavesTableColumnEnabled = $('.template-salt-caves-table-column-enabled').text();
    let mustacheTemplateSaltCavesTableColumnWorkingTime = $('.template-salt-caves-table-column-working_time').text();

    $saltCavesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $saltCavesTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnCreated, {cave}),
            },
            {
                targets: 1,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnTitle, {cave}),
            },
            {
                targets: 2,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnAddress, {cave}),
            },
            {
                targets: 3,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnPhoneNumbers, {cave}),
            },
            {
                targets: 4,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnWorkingTime, {cave}),
            },
            {
                targets: 5,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnEnabled, {cave}),
            },
            {
                targets: 6,
                orderable: false,
                render: (data, type, cave) => Mustache.render(mustacheTemplateSaltCavesTableColumnActions, {cave}),
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
            $('.count').text(settings.json.count);
            $('.enabled-count').text(settings.json.enabled_count);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#saltCavesTable').DataTable().search(this.value).draw();
        }
    });

    $(document).on('click', '.open-salt-cave-modal', function (e) {
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
                let $modal = $('#salt-cave-modal');
                $modal.modal('show');
                $('.select2', $modal).select2({
                    tags: true
                });
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

    $(document).on('change keyup', '.salt-cave-create-form', function (e) {
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

    $(document).on('submit', '.salt-cave-create-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#salt-cave-modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                notifyService.showMessage('info', 'Успех!', response.message);
                $saltCavesTable.DataTable().ajax.reload();
                $modal.modal('hide');
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

    $(document).on('click', '.salt-caves-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить данные соляной пещеры?",
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
                        $saltCavesTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Соляная пещера будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Соляная пещера не будет удалена.", "error");
            }
        });
    });

    $(document).on('change', '.salt-cave-enabled', function () {
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
});
