$(function () {
    let $blogArticlesTable = $('#blogArticlesTable');

    if (!$blogArticlesTable.length) {
        return;
    }

    let mustacheTemplateBlogArticlesTableColumnCreated = $('.template-blog-articles-table-column-created').text();
    let mustacheTemplateBlogArticlesTableColumnTitle = $('.template-blog-articles-table-column-title').text();
    let mustacheTemplateBlogArticlesTableColumnCategories = $('.template-blog-articles-table-column-categories').text();
    let mustacheTemplateBlogArticlesTableColumnPublished = $('.template-blog-articles-table-column-published').text();
    let mustacheTemplateBlogArticlesTableColumnFavorite = $('.template-blog-articles-table-column-favorite').text();
    let mustacheTemplateBlogArticlesTableColumnUpdated = $('.template-blog-articles-table-column-updated').text();
    let mustacheTemplateBlogArticlesTableColumnViewed = $('.template-blog-articles-table-column-viewed').text();
    let mustacheTemplateBlogArticlesTableColumnActions = $('.template-blog-articles-table-column-actions').text();

    $blogArticlesTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $blogArticlesTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnCreated.replace(/@authorId/g, blog.author.id), {blog}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnTitle.replace(/@blogId/g, blog.id), {blog}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnCategories, {blog}),
            },
            {
                targets: 3,
                data: 'enable',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnPublished.replace(/@blogId/g, blog.id), {blog}),
            },
            {
                targets: 4,
                data: 'favorite',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnFavorite, {blog}),
            },
            {
                targets: 5,
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnUpdated.replace(/@authorId/g, blog.updater.id), {blog}),
            },
            {
                targets: 6,
                data: 'view_count',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnViewed, {blog}),
            },
            {
                targets: 7,
                orderable: false,
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnActions.replace(/@blogId/g, blog.id), {blog}),
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
            $('.enable-news-count').text(settings.json.counters.enable_news_count);
            $('.view-count-total').text(settings.json.counters.view_count_total);
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

    $(document).on('click', '.blog-article-delete', function (e) {
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
                        $blogArticlesTable.DataTable().ajax.reload();
                        notifyService.showMessage('info', 'Успех!', response.message);
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
});
