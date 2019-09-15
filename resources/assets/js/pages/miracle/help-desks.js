$(function () {
    let $helpDeskForm = $('.helpdesk-form');

    if (!$helpDeskForm.length) {
        return;
    }

    $(document).on('submit', '.helpdesk-form', function (e) {
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
                $helpDeskForm.closest('section').find('.alert').removeAttr('hidden');
                $helpDeskForm.closest('.container').attr('hidden', 'hidden');
            },
            error: xhr => {
                if ('object' === typeof xhr.responseJSON) {
                    for (let key in xhr.responseJSON['errors']) {
                        let $input = $form.find('[name="' + key + '"]');
                        $input.closest('div').hasClass('checkbox')
                            ? $input.closest('.form-group').addClass('has-error')
                            : $input.addClass('has-error');
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