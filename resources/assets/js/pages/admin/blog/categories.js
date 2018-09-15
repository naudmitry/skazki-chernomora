import slug from "slug";

$(function () {
    let $blogCategories = $('.blog-categories');

    if (!$blogCategories.length) {
        return;
    }

    let $blogCategoriesSettingsContainer = $('.blog-categories-settings-container');
    let blogCategorySettingsLoadingTemplate = $('.blog-category-settings-loading-template').text();
    let $blogCategoriesList = $('.blog-categories-list');
    let isChange = false;

    $(document).on('click', '.blog-category-settings-open', function (e) {
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
        if ($blogCategoriesSettingsContainer.data('ajax')) {
            $blogCategoriesSettingsContainer.data('ajax').abort();
        }
        $blogCategoriesSettingsContainer.html(blogCategorySettingsLoadingTemplate);
        $blogCategoriesSettingsContainer.data('ajax', $.ajax({
            type: 'get',
            url: href,
            cache: false,
            success: response => {
                $blogCategoriesSettingsContainer.html(response);
            },
            error: xhr => {
                if (xhr.statusText == 'abort') {
                    return;
                }
                console.error(xhr);
                $blogCategoriesSettingsContainer.empty();
            },
            complete: () => {
                $blogCategoriesSettingsContainer.removeData('ajax');
            },
        }));
    }

    $(document).on('submit', '.blog-category-settings-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            return;
        }
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
                $blogCategoriesSettingsContainer.html(response.settings);
                notifyService.showMessage('info', 'Успех!', response.message);
                isChange = false;
            },
            error: xhr => {
                if (xhr.responseJSON.errors.address) {
                    notifyService.showMessage('danger', 'Ошибка!', 'Данный адрес уже существует.');
                }
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
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        let $blogCategoriesListItem =
                            $blogCategoriesList.find('.blog-categories-list-item[data-blog-category-id="' + response.category.id + '"]');
                        let $blogCategorySettingsContainer = $('.blog-category-settings-container');
                        if ($blogCategorySettingsContainer.data('category-id') == response.category.id) {
                            $blogCategoriesSettingsContainer.empty();
                        }
                        $blogCategoriesListItem.remove();
                        isChange = false;
                        notifyService.showMessage('danger', 'Успех!', response.message);
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

    $(document).on('input', '.blog-category-settings-form', function (e) {
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

    let dragula = require('dragula');

    dragula([document.getElementById('container')], {
        mirrorContainer: document.querySelector('.blog-categories-list'),
        moves: function (el, container, handle) {
            return handle.classList.contains('dragula-handle');
        }
    }).on('dragend', function (el) {
        let categories = [];
        $('#container > div').each(function (index, el) {
            categories.push($(el).data('blog-category-id'))
        });
        $.ajax({
            method: 'POST',
            url: backendPageConfig.saveCategorySequence,
            dataType: 'json',
            data: {
                categories: categories
            },
            success: function (response) {
                notifyService.showMessage('info', 'Успех!', response.message);
            },
        });
    });

    $(document).on('change', '.checkbox', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'POST',
            success: (response) => {
                notifyService.showMessage('info', 'Успех!', response.message);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('change keyup', '.blog-category-settings-form input[id=name]', function () {
        let title = $blogCategoriesSettingsContainer.find('#name').val();
        $blogCategoriesSettingsContainer.find('#address').val(slug(title).toLowerCase());
        $blogCategoriesSettingsContainer.find('#metaTitle').val(title.slice(0, 27) + ((title.length > 27) ? '...' : ''));
        $blogCategoriesSettingsContainer.find('#metaDescription').val(title.slice(0, 57) + ((title.length > 57) ? '...' : ''));
    });
});
