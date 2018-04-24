import {completeAjaxFormSubmit} from "../../core";

$(function () {
    let $paymentItem = $('.payment-item');

    if (!$paymentItem.length) {
        return;
    }

    $('.select2').select2({
        minimumResultsForSearch: Infinity,
        width: '100%'
    });

    $(document).on('submit', '.payment-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            return;
        }
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                window.location.href = response.redirect;
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
                completeAjaxFormSubmit($form);
            },
        }));
    });
});