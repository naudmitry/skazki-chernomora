import {completeAjaxFormSubmit} from "../core";

$(function () {
    let $buyerItem = $('.buyer-item');

    if (!$buyerItem.length) {
        return;
    }

    $('.select2', $buyerItem).select2({
        width: '100%'
    });

    $('#contract_at, #birthday_at').datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: ((new Date).getFullYear() - 100) + ':' + (new Date).getFullYear(),
    });

    $('#passport_issuing_at').datepicker({
        changeYear: true,
        changeMonth: true,
    });

    $(document).on('submit', '.buyer-general-form', function (e) {
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
                if (response.redirectTo) {
                    window.location.href = response.redirectTo;
                } else {
                    notifyService.showMessage('info', 'Успех!', response.message);
                    $('#historiesTable').DataTable().ajax.reload();
                }
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