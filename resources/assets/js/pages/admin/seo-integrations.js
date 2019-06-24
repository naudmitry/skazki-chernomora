var PageService =
    {
        save: function (form) {
            let $form = $(form);

            if ($form.data('ajax')) {
                $form.data('ajax').abort();
            }

            let formData = new FormData($form[0]);

            $form.data('ajax', $.ajax(
                {
                    method: 'POST',
                    url: $form.attr('action'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        notifyService.showMessage('info', 'Успех!', response.message);
                    },
                    complete: () => {
                        $form.removeData('ajax');
                        $form.find('[type=submit]')
                            .removeClass('btn-primary')
                            .addClass('btn-default');

                        setTimeout(() => $form.find('[type=submit]').prop('disabled', true), 0);
                    }
                }));
        },
        unlockSaveBtn: function (btnEl) {
            var btn = btnEl ? btnEl : $('form.settings-general-form button[type=submit]');
            if (btn.attr('disabled')) {
                btn.removeAttr('disabled').removeClass('btn-default').addClass('btn-primary');
            }
        },
        init: function () {
            $(document).on('submit', '.settings-robots-form', function (e) {
                e.preventDefault();
                PageService.save(this);
                return false;
            });

            $(document).on('select2:select input switchChange.bootstrapSwitch change', 'form', function (e) {
                let $btn = $(e.target).closest('form').find('button[type=submit]');
                PageService.unlockSaveBtn($btn);
            });
        },
    };

$(function()
{
    if ('seo-integrations' !== $('body').data('page')) {
        return;
    }

    PageService.init();
});