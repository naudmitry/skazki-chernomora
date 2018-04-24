import slug from "slug";
import {completeAjaxFormSubmit} from "../core";

$(function () {
    let $faqCategoriesList = $('.faq-categories-list');

    if (!$faqCategoriesList.length) {
        return;
    }

    let $faqCategoriesSettingsContainer = $('.faq-categories-settings-container');
    let faqCategorySettingsLoadingTemplate = $('.faq-category-settings-loading-template').text();
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
        } else {
            edit($this.attr('href'));
        }
    });

    function edit(href) {
        if ($faqCategoriesSettingsContainer.data('ajax')) {
            $faqCategoriesSettingsContainer.data('ajax').abort();
        }
        let prevCategoryId = $faqCategoriesSettingsContainer.find('.faq-category-settings-container').data('category-id');
        $faqCategoriesSettingsContainer.html(faqCategorySettingsLoadingTemplate);
        $faqCategoriesSettingsContainer.data('ajax', $.ajax({
            type: 'get',
            url: href,
            cache: false,
            success: response => {
                $faqCategoriesSettingsContainer.html(response.view);
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
                $faqCategoriesSettingsContainer.empty();
            },
            complete: () => {
                $faqCategoriesSettingsContainer.removeData('ajax');
            },
        }));
    }

    $(document).on('submit', '.faq-category-settings-form', function (e) {
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
                let $faqCategoriesListItem =
                    $faqCategoriesList.find('.faq-categories-list-item[data-faq-category-id="' + response.category.id + '"]');
                if ($faqCategoriesListItem.length) {
                    $faqCategoriesListItem.replaceWith(response.row);
                } else {
                    $faqCategoriesList.append(response.row);
                }
                $faqCategoriesSettingsContainer.html(response.settings);
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
                completeAjaxFormSubmit($form);
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
                        let $faqCategorySettingsContainer = $('.faq-category-settings-container');
                        if ($faqCategorySettingsContainer.data('category-id') == response.category.id) {
                            $faqCategoriesSettingsContainer.empty();
                        }
                        $faqCategoriesListItem.remove();
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

    $(document).on('change keyup', '.faq-category-settings-form input[id=name]', function () {
        let title = $faqCategoriesSettingsContainer.find('#name').val();
        $faqCategoriesSettingsContainer.find('#breadcrumbs').val(title.slice(0, 30));
        $faqCategoriesSettingsContainer.find('#address').val(slug(title).toLowerCase());
        $faqCategoriesSettingsContainer.find('#metaTitle').val(title.slice(0, 27) + ((title.length > 27) ? '...' : ''));
        $faqCategoriesSettingsContainer.find('#metaDescription').val(title.slice(0, 57) + ((title.length > 57) ? '...' : ''));
    });

    let setBackgroundListItem = function (categoryId, set) {
        let $faqCategoryItem = $faqCategoriesList
            .find('.faq-categories-list-item[data-faq-category-id="' + categoryId + '"]')
            .find('.faq-category-settings-open');
        $faqCategoryItem.css('color', (set) ? $faqCategoriesList.data('color') : '');
    };
});
