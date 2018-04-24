import slug from "slug";
import {completeAjaxFormSubmit} from "../core";

$(function () {
    let $pageSettings = $('.page-settings');

    if (!$pageSettings.length) {
        return;
    }

    $pageSettings.find('.select2').select2({
        width: '100%',
        language: {
            noResults: function (params) {
                return "Результаты не найдены";
            }
        }
    });

    $(document).on('submit', '.page-settings-form', function (e) {
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

                console.log(response.settings);

                $pageSettings.replaceWith(response.settings);
                notifyService.showMessage('info', 'Успех!', response.message);
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

    $(document).on('change keyup', '.page-settings-form input[id=name]', function () {
        let title = $('#name').val();
        $pageSettings.find('#address').val(slug(title).toLowerCase());
        $pageSettings.find('#metaTitle').val(title.slice(0, 27) + ((title.length > 27) ? '...' : ''));
        $pageSettings.find('#metaDescription').val(title.slice(0, 57) + ((title.length > 57) ? '...' : ''));
    });
});
