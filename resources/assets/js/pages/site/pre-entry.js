$(function () {
    let $appoinmentSection = $('.make-appointment-section');

    if (!$appoinmentSection.length) {
        return;
    }

    $(document).on('submit', '.pre-entry-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.find('.has-error').removeClass('has-error');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                $form[0].reset();
            },
            error: xhr => {
                if ('object' === typeof xhr.responseJSON) {
                    for (let key in xhr.responseJSON['errors']) {
                        let $input = $form.find('[name="' + key + '"]');
                        if ($input.is('input')) {
                            $input.addClass('has-error');
                        }
                        if ($input.is('select') || $input.attr('type') === 'checkbox') {
                            $input.closest('.form-group').addClass('has-error');
                        }
                    }
                    return;
                }
                console.error(xhr);
            },
            complete: () => {
                $form.removeData('ajax');
            },
        }));
    });
});