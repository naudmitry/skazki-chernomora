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
    let mustacheTemplateFaqQuestionsTableColumnAuthor = $('.template-faq-questions-table-column-author').text();
    let mustacheTemplateFaqQuestionsTableColumnUpdated = $('.template-faq-questions-table-column-updated').text();
    let mustacheTemplateFaqQuestionsTableColumnUpdater = $('.template-faq-questions-table-column-updater').text();
    let mustacheTemplateFaqQuestionsTableColumnViewed = $('.template-faq-questions-table-column-viewed').text();
    let mustacheTemplateFaqQuestionsTableColumnActions = $('.template-faq-questions-table-column-actions').text();

    $faqQuestionsTable.DataTable({
        "scrollX": true,
        language: {
            processing: "Подождите...",
            search: "Поиск:",
            lengthMenu: "Показать _MENU_ записей",
            info: "Записи с _START_ до _END_ из _TOTAL_ записей",
            infoEmpty: "Записи с 0 до 0 из 0 записей",
            infoFiltered: "(отфильтровано из _MAX_ записей)",
            infoPostFix: "",
            loadingRecords: "Загрузка записей...",
            zeroRecords: "Записи отсутствуют.",
            emptyTable: "В таблице отсутствуют данные",
            paginate: {
                first: "Первая",
                previous: "Предыдущая",
                next: "Следующая",
                last: "Последняя"
            }
        },
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
                data: 'created_at',
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnCreated, {faq}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnTitle, {faq}),
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
                data: 'author_id',
                sortable: false,
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnAuthor, {faq}),
            },
            {
                targets: 5,
                data: 'updated_at',
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnUpdated, {faq}),
            },
            {
                targets: 6,
                data: 'updater_id',
                sortable: false,
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnUpdater, {faq}),
            },
            {
                targets: 7,
                data: 'view_count',
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnViewed, {faq}),
            },
            {
                targets: 8,
                orderable: false,
                render: (data, type, faq) => Mustache.render(mustacheTemplateFaqQuestionsTableColumnActions, {faq}),
            },
        ],
        lengthMenu: [15, 25, 50, 75, 100],
        displayLength: 15,
    });

    $(document).on('change', '.checkbox', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'post',
            success: (response) => {
                $.notify({
                    title: "Успех!",
                    message: response.message,
                    icon: 'fa fa-check'
                }, {
                    type: "info",
                    placement: {
                        from: "top",
                        align: "right",
                    },
                });
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
                        $.notify({
                            title: "Успех!",
                            message: response.message,
                            icon: 'fa fa-check'
                        }, {
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right",
                            },
                        });

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
});
