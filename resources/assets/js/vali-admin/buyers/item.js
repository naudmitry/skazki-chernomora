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

    $(document).on('change keyup', '.buyer-general-form', function (e) {
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
                $form.removeData('ajax');
                $form.find('[type=submit]')
                    .removeClass('btn-primary')
                    .addClass('btn-default')
                    .prop('disabled', true);
            },
        }));
    });
});