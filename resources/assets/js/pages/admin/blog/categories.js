$(function () {
    let $blogCategories = $('.blog-categories');

    if (!$blogCategories.length) {
        return;
    }

    let $blogCategorySettingsContainer = $('.blog-category-settings-container');
    let blogCategorySettingsLoadingTemplate = $('.blog-category-settings-loading-template').text();
    let $blogCategoriesList = $('.blog-categories-list');
    let isChange = false;

    $(document).on('click', '.blog-categories-settings-open', function (e, options = {isConfirm: false}) {
        e.preventDefault();
        let $this = $(this);

        if (isChange) {
            swal({
                title: "Вы действительно уверены?",
                text: "Данные, которые не были сохранены, будут удалены.",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ок",
                cancelButtonText: "Отмена",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    swal("Изменение подтверждено!", "Данные будут изменены.", "success");
                    isChange = false;
                } else {
                    swal("Изменение отменено!", "Данные не будут изменены.", "error");
                    return false;
                }
            }).then(() => $this.trigger('click', {isConfirm: true}));
        }

        if ($blogCategorySettingsContainer.data('ajax')) {
            $blogCategorySettingsContainer.data('ajax').abort();
        }
        $blogCategorySettingsContainer.html(blogCategorySettingsLoadingTemplate);
        $blogCategorySettingsContainer.data('ajax', $.ajax({
            type: 'get',
            url: $this.attr('href'),
            cache: false,
            success: response => {
                $blogCategorySettingsContainer.html(response);
            },
            error: xhr => {
                if (xhr.statusText == 'abort') {
                    return;
                }
                console.error(xhr);
                $blogCategorySettingsContainer.empty();
            },
            complete: () => {
                $blogCategorySettingsContainer.removeData('ajax');
            },
        }));
    });

    $(document).on('submit', '.blog-category-settings-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            return;
        }
        $form.find('.is-invalid').removeClass('is-invalid');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                let $blogCategoriesListItem =
                    $blogCategoriesList.find('.blog-categories-list-item[data-blog-category-id="' + response.category.id + '"]');
                if ($blogCategoriesListItem.length) {
                    $blogCategoriesListItem.replaceWith(response.row);
                }
                else {
                    $blogCategoriesList.append(response.row);
                }
                $blogCategorySettingsContainer.html(response.settings);

                $.notify({
                    title: "Успех!",
                    message: response.message,
                    icon: 'fa fa-check',
                    showProgressbar: true
                }, {
                    type: "info",
                    placement: {
                        from: "top",
                        align: "right",
                    },
                });

                isChange = false;
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

    $(document).on('click', '.blog-category-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить категорию?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Да, удалить",
            cancelButtonText: "Отмена",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        let $blogCategoriesListItem =
                            $blogCategoriesList.find('.blog-categories-list-item[data-blog-category-id="' + response.category.id + '"]');
                        $blogCategorySettingsContainer.empty();
                        $blogCategoriesListItem.remove();

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
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Категория будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Категория не будет удалена.", "error");
            }
        });
    });

    $(document).on('change keyup', '.blog-category-settings-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);

        isChange = true;

        if (!$input.is('input,select,textarea')) {
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
