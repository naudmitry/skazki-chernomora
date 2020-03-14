import slug from "slug";

$(function () {
    let $pageCategoriesList = $('.page-categories-list');

    if (!$pageCategoriesList.length) {
        return;
    }

    let $pageCategoriesSettingsContainer = $('.page-categories-settings-container');
    let pageCategorySettingsLoadingTemplate = $('.page-category-settings-loading-template').text();
    let isChange = false;

    $(document).on('click', '.page-category-settings-open', function (e) {
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
        if ($pageCategoriesSettingsContainer.data('ajax')) {
            $pageCategoriesSettingsContainer.data('ajax').abort();
        }
        let prevCategoryId = $pageCategoriesSettingsContainer.find('.page-category-settings-container').data('category-id');
        $pageCategoriesSettingsContainer.html(pageCategorySettingsLoadingTemplate);
        $pageCategoriesSettingsContainer.data('ajax', $.ajax({
            type: 'get',
            url: href,
            cache: false,
            success: response => {
                $pageCategoriesSettingsContainer.html(response);

                $pageCategoriesSettingsContainer.html(response.view);
                if (prevCategoryId !== response.categoryId) {
                    setBackgroundListItem(prevCategoryId, false);
                }
                setBackgroundListItem(response.categoryId, true);
            },
            error: xhr => {
                if (xhr.statusText == 'abort') {
                    return;
                }
                console.error(xhr);
                $pageCategoriesSettingsContainer.empty();
            },
            complete: () => {
                $pageCategoriesSettingsContainer.removeData('ajax');
            },
        }));
    }

    $(document).on('submit', '.page-category-settings-form', function (e) {
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
                let $pageCategoriesListItem =
                    $pageCategoriesList.find('.page-categories-list-item[data-page-category-id="' + response.category.id + '"]');
                if ($pageCategoriesListItem.length) {
                    $pageCategoriesListItem.replaceWith(response.row);
                } else {
                    $pageCategoriesList.append(response.row);
                }
                $pageCategoriesSettingsContainer.html(response.settings);
                setBackgroundListItem(response.category.id, true);
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

    $(document).on('click', '.page-category-delete', function (e) {
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
                        let $pageCategoriesListItem =
                            $pageCategoriesList.find('.page-categories-list-item[data-page-category-id="' + response.category.id + '"]');
                        let $pageCategorySettingsContainer = $('.page-category-settings-container');
                        if ($pageCategorySettingsContainer.data('category-id') == response.category.id) {
                            $pageCategoriesSettingsContainer.empty();
                        }
                        $pageCategoriesListItem.remove();
                        isChange = false;
                        notifyService.showMessage('info', 'Успех!', response.message);
                    },
                    error: xhr => {
                        notifyService.showMessage('danger', 'Ошибка!', xhr.responseJSON.message);
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Категория будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Категория не будет удалена.", "error");
            }
        });
    });

    $(document).on('input', '.page-category-settings-form', function (e) {
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
        mirrorContainer: document.querySelector('.page-categories-list'),
        moves: function (el, container, handle) {
            return handle.classList.contains('dragula-handle');
        }
    }).on('dragend', function (el) {
        let categories = [];

        $('#container > div').each(function (index, el) {
            categories.push($(el).data('page-category-id'))
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

    $(document).on('change keyup', '.page-category-settings-form input[id=name]', function () {
        let title = $pageCategoriesSettingsContainer.find('#name').val();
        $pageCategoriesSettingsContainer.find('#address').val(slug(title).toLowerCase());
        $pageCategoriesSettingsContainer.find('#metaTitle').val(title.slice(0, 27) + ((title.length > 27) ? '...' : ''));
        $pageCategoriesSettingsContainer.find('#metaDescription').val(title.slice(0, 57) + ((title.length > 57) ? '...' : ''));
    });

    let setBackgroundListItem = function (categoryId, set) {
        let $pageCategoryItem = $pageCategoriesList
            .find('.page-categories-list-item[data-page-category-id="' + categoryId + '"]')
            .find('.page-category-settings-open');
        $pageCategoryItem.css('color', (set) ? $pageCategoriesList.data('color') : '');
    };
});
