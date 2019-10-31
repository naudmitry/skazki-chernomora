$(function () {
    let $order = $('.order-item');

    if (!$order.length) {
        return;
    }

    $order.find('.select2').select2({
        minimumResultsForSearch: Infinity,
        width: '100%'
    });

    $order.find('input[name=begin_at], input[name=end_at]').datepicker();

    $(document).on('change keyup', '.order-general-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);
        if (!$input.is('input,select')) {
            return;
        }
        $form.find('[type=submit]')
            .removeClass('btn-default')
            .addClass('btn-primary')
            .prop('disabled', false);
    });

    $(document).on('submit', '.order-general-form', function (e) {
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
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    notifyService.showMessage('info', 'Успех!', response.message);
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

    require('./family');
    require('./history');
});