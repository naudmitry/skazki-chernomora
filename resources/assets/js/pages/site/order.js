$(function () {
    let $appoinmentSection = $('.appoinment-section');

    if (!$appoinmentSection.length) {
        return;
    }

    $(document).on('submit', '.order-form', function (e) {
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
                console.error(xhr);
            },
            complete: () => {
                $form.removeData('ajax');
            },
        }));
    });
});