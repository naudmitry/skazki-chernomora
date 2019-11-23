$(function () {
    let $faqQuestions = $('.faq-questions');

    if (!$faqQuestions.length) {
        return;
    }

    let $faqQuestionsTable = $('#faqQuestionsTable');
    let mustacheTemplateFaqQuestionsTableColumnCreated = $('.template-faq-questions-table-column-created').text();
    let mustacheTemplateFaqQuestionsTableColumnTitle = $('.template-faq-questions-table-column-title').text();
    let mustacheTemplateFaqQuestionsTableColumnCategories = $('.template-faq-questions-table-column-categories').text();
    let mustacheTemplateFaqQuestionsTableColumnPublished = $('.template-faq-questions-table-column-published').text();
    let mustacheTemplateFaqQuestionsTableColumnFavorite = $('.template-faq-questions-table-column-favorite').text();
    let mustacheTemplateFaqQuestionsTableColumnUpdated = $('.template-faq-questions-table-column-updated').text();
    let mustacheTemplateFaqQuestionsTableColumnViewed = $('.template-faq-questions-table-column-viewed').text();
    let mustacheTemplateFaqQuestionsTableColumnActions = $('.template-faq-questions-table-column-actions').text();

    $faqQuestionsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $faqQuestionsTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnCreated.replace(/@authorId/g, faq.author.id), {faq}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnTitle.replace(/@faqId/g, faq.id), {faq}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnCategories, {faq}),
            },
            {
                targets: 3,
                data: 'enable',
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnPublished, {faq}),
            },
            {
                targets: 4,
                data: 'favorite',
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnFavorite, {faq}),
            },
            {
                targets: 5,
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnUpdated.replace(/@authorId/g, faq.updater.id), {faq}),
            },
            {
                targets: 6,
                data: 'view_count',
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnViewed, {faq}),
            },
            {
                targets: 7,
                orderable: false,
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnActions.replace(/@faqId/g, faq.id), {faq}),
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
            $('.enable-faqs-count').text(settings.json.counters.enable_faqs_count);
            $('.view-count-total').text(settings.json.counters.view_count_total);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#faqQuestionsTable').DataTable().search(this.value).draw();
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

    $(document).on('click', '.faq-question-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить вопрос?",
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
                        $faqQuestionsTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Вопрос будет удален.", "success");
            } else {
                swal("Удаление отменено!", "Вопрос не будет удален.", "error");
            }
        });
    });

    $('.open-create-form').bind('click', function () {
        location.href = $(this).data('href');
    });
});
