$(function () {
    $(document).on('input', 'form', function (e) {
        let $form = $(this);
        let $input = $(e.target);

        if (!$input.is('input,select,textarea')) {
            return;
        }

        if ((e.type == 'keyup') && ($input.attr('type') != 'text')) {
            return;
        }

        $form.find('[type=submit]')
            .removeClass('btn-default')
            .addClass('btn-primary')
            .prop('disabled', false);
    });
});

export function completeAjaxFormSubmit(form) {
    form.removeData('ajax');

    form.find('[type=submit]')
        .removeClass('btn-primary')
        .addClass('btn-default')
        .prop('disabled', true);
}