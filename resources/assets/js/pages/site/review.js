$(function () {
    let $reviewForm = $('.send-review-form');

    if (!$reviewForm.length) {
        return;
    }
    //
    // $('#reviewModal').modal({
    //     keyboard: false
    // });

    $(document).on('submit', '.send-review-form', function (e) {
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
                $reviewForm[0].reset();
                $('#reviewModal').modal('hide');
            },
            error: xhr => {
                if ('object' === typeof xhr.responseJSON) {
                    for (let key in xhr.responseJSON['errors']) {
                        let $input = $form.find('[name="' + key + '"]');
                        $input.closest('.form-group').addClass('has-error');
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