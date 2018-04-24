import slug from "slug";
import {completeAjaxFormSubmit} from "../core";

$(function () {
    let $faqItem = $('.faq-item');

    if (!$faqItem.length) {
        return;
    }

    let faqItemSettingsLoadingTemplate = $('.faq-item-settings-loading-template').text();

    $faqItem.find('.select2').select2({
        width: '100%'
    });

    $(document).on('submit', '.faq-item-form', function (e) {
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
                if (response.redirectUrl) {
                    window.location.href = response.redirectUrl;
                }
                else {
                    $faqItem.html(response.settings);
                    $faqItem.find('.select2').select2({width: '100%'});
                    notifyService.showMessage('info', 'Успех!', response.message);
                }
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

    $(document).on('change', 'input.entity-availability', function () {
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

    $(document).on('change keyup', '.faq-item-form input[id=name]', function () {
        let title = $faqItem.find('#name').val();
        $faqItem.find('#address').val(slug(title).toLowerCase());
        $faqItem.find('#metaTitle').val(title.slice(0, 27) + ((title.length > 27) ? '...' : ''));
        $faqItem.find('#metaDescription').val(title.slice(0, 57) + ((title.length > 57) ? '...' : ''));
    });
});
