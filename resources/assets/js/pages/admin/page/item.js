import slug from "slug";

$(function () {
    let $pageItem = $('.page-item');

    if (!$pageItem.length) {
        return;
    }

    let pageItemSettingsLoadingTemplate = $('.page-item-settings-loading-template').text();

    $pageItem.find('.select2').select2({
        width: '100%'
    });

    $(document).on('change keyup', '.page-item-form', function (e) {
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

    $(document).on('submit', '.page-item-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            return;
        }
        if (!$pageItem.data('new')) {
            $pageItem.html(pageItemSettingsLoadingTemplate);
        }
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                if (response.redirectUrl) {
                    window.location.href = response.redirectUrl;
                }
                else {
                    $pageItem.html(response.settings);
                    $pageItem.find('.select2').select2({width: '100%'});
                    $.notify({
                        title: "Успех!",
                        message: response.message,
                        icon: 'fa fa-check',
                        showProgressbar: true
                    }, {
                        type: "info",
                        placement: {
                            from: "top",
                            align: "right",
                        },
                    });
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

    $(document).on('change', '.checkbox', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'post',
            success: (response) => {
                $.notify({
                    title: "Успех!",
                    message: response.message,
                    icon: 'fa fa-check'
                }, {
                    type: "info",
                    placement: {
                        from: "top",
                        align: "right",
                    },
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('change keyup', '.page-item-form input[id=name]', function () {
        let title = $pageItem.find('#name').val();
        $pageItem.find('#address').val(slug(title).toLowerCase());
        $pageItem.find('#metaTitle').val(title.slice(0, 27) + ((title.length > 27) ? '...' : ''));
        $pageItem.find('#metaDescription').val(title.slice(0, 57) + ((title.length > 57) ? '...' : ''));
    });
});
