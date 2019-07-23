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
                $form[0].reset();
                $form.find('.checkbox').removeClass('checked');
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