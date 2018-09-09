import slug from "slug";

$(function () {
    let $faqCategories = $('.faq-categories');

    if (!$faqCategories.length) {
        return;
    }

    let $faqCategorySettingsContainer = $('.faq-category-settings-container');
    let faqCategorySettingsLoadingTemplate = $('.faq-category-settings-loading-template').text();
    let $faqCategoriesList = $('.faq-categories-list');
    let isChange = false;

    $(document).on('click', '.faq-category-settings-open', function (e) {
        e.preventDefault();
        let $this = $(this);

        if (isChange) {
            swal({
                title: "Вы действительно уверены?",
                text: "Данные, которые не были сохранены, будут удалены.",
                icon: "warning",
                buttons: ["Отмена", "Ок"],
                dangerMode: true,
            }).then(value => {
                if (value) {
                    swal("Изменение подтверждено!", "Данные будут изменены.", "success");
                    isChange = false;
                    edit($this.attr('href'));
                } else {
                    swal("Изменение отменено!", "Данные не будут изменены.", "error");
                }
            });
        }
        else {
            edit($this.attr('href'));
        }
    });

    function edit(href) {
        if ($faqCategorySettingsContainer.data('ajax')) {
            $faqCategorySettingsContainer.data('ajax').abort();
        }
        $faqCategorySettingsContainer.html(faqCategorySettingsLoadingTemplate);
        $faqCategorySettingsContainer.data('ajax', $.ajax({
            type: 'get',
            url: href,
            cache: false,
            success: response => {
                $faqCategorySettingsContainer.html(response);
            },
            error: xhr => {
                if (xhr.statusText == 'abort') {
                    return;
                }
                console.error(xhr);
                $faqCategorySettingsContainer.empty();
            },
            complete: () => {
                $faqCategorySettingsContainer.removeData('ajax');
            },
        }));
    }

    $(document).on('submit', '.faq-category-settings-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            return;
        }
        $faqCategorySettingsContainer.html(faqCategorySettingsLoadingTemplate);
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                let $faqCategoriesListItem =
                    $faqCategoriesList.find('.faq-categories-list-item[data-faq-category-id="' + response.category.id + '"]');
                if ($faqCategoriesListItem.length) {
                    $faqCategoriesListItem.replaceWith(response.row);
                }
                else {
                    $faqCategoriesList.append(response.row);
                }
                $faqCategorySettingsContainer.html(response.settings);

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

    $(document).on('click', '.faq-category-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить категорию?",
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        let $faqCategoriesListItem =
                            $faqCategoriesList.find('.faq-categories-list-item[data-faq-category-id="' + response.category.id + '"]');
                        $faqCategorySettingsContainer.empty();
                        $faqCategoriesListItem.remove();
                        isChange = false;

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

    $(document).on('change keyup', '.faq-category-settings-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);
        isChange = true;
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

    let dragula = require('dragula');

    dragula([document.getElementById('container')], {
        mirrorContainer: document.querySelector('.faq-categories-list'),
        moves: function (el, container, handle) {
            return handle.classList.contains('dragula-handle');
        }
    }).on('dragend', function (el) {
        let categories = [];

        $('#container > div').each(function (index, el) {
            categories.push($(el).data('faq-category-id'))
        });

        $.ajax({
            method: 'POST',
            url: backendPageConfig.saveCategorySequence,
            dataType: 'json',
            data: {
                categories: categories
            },
            success: function (response) {
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
        });
    });

    $(document).on('change', '.checkbox', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'POST',
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

    $(document).on('change keyup', '.faq-category-settings-form input[id=name]', function () {
        let title = $faqCategorySettingsContainer.find('#name').val();
        $faqCategorySettingsContainer.find('#address').val(slug(title).toLowerCase());
        $faqCategorySettingsContainer.find('#metaTitle').val(title.slice(0, 27) + ((title.length > 27) ? '...' : ''));
        $faqCategorySettingsContainer.find('#metaDescription').val(title.slice(0, 57) + ((title.length > 57) ? '...' : ''));
    });
});
