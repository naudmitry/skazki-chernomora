import slug from "slug";

$(function () {
    let $faqItem = $('.faq-item');

    if (!$faqItem.length) {
        return;
    }

    let faqItemSettingsLoadingTemplate = $('.faq-item-settings-loading-template').text();

    $faqItem.find('.select2').select2({
        width: '100%'
    });

    $(document).on('change keyup', '.faq-item-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);
        if (!$input.is('input,select,textarea')) {
            return;
        }
        $form.find('[type=submit]')
            .removeClass('btn-default')
            .addClass('btn-primary')
            .prop('disabled', false);
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
                $form.removeData('ajax');
                $form.find('[type=submit]')
                    .removeClass('btn-primary')
                    .addClass('btn-default')
                    .prop('disabled', true);
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
