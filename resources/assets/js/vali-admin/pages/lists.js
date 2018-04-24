$(function () {
    let $pageLists = $('.page-lists');

    if (!$pageLists.length) {
        return;
    }

    let $pageListsTable = $('#pageListsTable');
    let mustacheTemplatePageListsTableColumnCreated = $('.template-page-lists-table-column-created').text();
    let mustacheTemplatePageListsTableColumnTitle = $('.template-page-lists-table-column-title').text();
    let mustacheTemplatePageListsTableColumnCategory = $('.template-page-lists-table-column-category').text();
    let mustacheTemplatePageListsTableColumnPublished = $('.template-page-lists-table-column-published').text();
    let mustacheTemplatePageListsTableColumnUpdated = $('.template-page-lists-table-column-updated').text();
    let mustacheTemplatePageListsTableColumnViewed = $('.template-page-lists-table-column-viewed').text();
    let mustacheTemplatePageListsTableColumnActions = $('.template-page-lists-table-column-actions').text();

    $pageListsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $pageListsTable.data('href'),
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
                render: (data, type, page) => Mustache.render(mustacheTemplatePageListsTableColumnCreated.replace(/@authorId/g, page.author.id), {page}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, page) => Mustache.render(mustacheTemplatePageListsTableColumnTitle.replace(/@pageId/g, page.id), {page}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, page) => Mustache.render(mustacheTemplatePageListsTableColumnCategory, {page}),
            },
            {
                targets: 3,
                data: 'enable',
                render: (data, type, page) => Mustache.render(mustacheTemplatePageListsTableColumnPublished.replace(/@pageId/g, page.id), {page}),
            },
            {
                targets: 4,
                data: 'updated_at',
                render: (data, type, page) => Mustache.render(mustacheTemplatePageListsTableColumnUpdated.replace(/@authorId/g, page.updater.id), {page}),
            },
            {
                targets: 5,
                data: 'view_count',
                render: (data, type, page) => Mustache.render(mustacheTemplatePageListsTableColumnViewed, {page}),
            },
            {
                targets: 6,
                orderable: false,
                render: (data, type, page) => Mustache.render(mustacheTemplatePageListsTableColumnActions.replace(/@pageId/g, page.id), {page}),
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
            $('.enable-pages-count').text(settings.json.counters.enable_pages_count);
            $('.view-count-total').text(settings.json.counters.view_count_total);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#pageListsTable').DataTable().search(this.value).draw();
        }
    });

    $(document).on('change', '.checkbox', function () {
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

    $(document).on('click', '.page-article-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить статью?",
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
                        $pageListsTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Статья будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Статья не будет удалена.", "error");
            }
        });
    });

    $('.open-create-form').bind('click', function () {
        location.href = $(this).data('href');
    });
});
