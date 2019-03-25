$(function () {
    let $adSources = $('.ad-sources');

    if (!$adSources.length) {
        return;
    }

    let $adSourcesTable = $('#adSourcesTable');
    let mustacheTemplateAdSourcesListsTableColumnActions = $('.template-ad-sources-lists-table-column-actions').text();
    let mustacheTemplateAdSourcesListsTableColumnCreated = $('.template-ad-sources-lists-table-column-created').text();
    let mustacheTemplateAdSourcesListsTableColumnEnabled = $('.template-ad-sources-lists-table-column-enabled').text();
    let mustacheTemplateAdSourcesListsTableColumnTitle = $('.template-ad-sources-lists-table-column-title').text();

    $adSourcesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $adSourcesTable.data('href'),
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
                render: (data, type, source) => Mustache.render(mustacheTemplateAdSourcesListsTableColumnCreated, {source}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, source) => Mustache.render(mustacheTemplateAdSourcesListsTableColumnTitle, {source}),
            },
            {
                targets: 2,
                data: 'is_enabled',
                render: (data, type, source) => Mustache.render(mustacheTemplateAdSourcesListsTableColumnEnabled, {source}),
            },
            {
                targets: 3,
                orderable: false,
                render: (data, type, source) => Mustache.render(mustacheTemplateAdSourcesListsTableColumnActions, {source}),
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
            $('#adSourcesTable').DataTable().search(this.value).draw();
        }
    });

    // $(document).on('change', '.checkbox', function () {
    //     $.ajax({
    //         url: $(this).data('href'),
    //         type: 'post',
    //         success: (response) => {
    //             notifyService.showMessage('info', 'Успех!', response.message);
    //         },
    //         error: function (data) {
    //             console.log(data);
    //         }
    //     });
    // });

    $(document).on('click', '.ad-source-list-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить источник рекламы?",
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
                        $adSourcesTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Источник рекламы будет удален.", "success");
            } else {
                swal("Удаление отменено!", "Источник рекламы не будет удален.", "error");
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
                let $modal = $('#ad-source-modal');
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

    $(document).on('submit', '.ad-source-list-edit-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('#ad-source-modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.find('.has-error').removeClass('has-error');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                $adSourcesTable.DataTable().ajax.reload();
                $modal.modal('hide');
            },
            error: xhr => {
                if ('object' === typeof xhr.responseJSON) {
                    for (let key in xhr.responseJSON) {
                        $form.find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
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
