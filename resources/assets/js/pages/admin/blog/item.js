import slug from "slug";

$(function () {
    let $blogItem = $('.blog-item');

    if (!$blogItem.length) {
        return;
    }

    tinymce.init({
        selector: '#textarea-editor',
        language: 'ru',
        height: 500,
        plugins: "image imagetools",
        setup: function (editor) {
            editor.on('keyup change', function (e) {
                $('.blog-item-editor-form').find('[type=submit]')
                    .removeClass('btn-default')
                    .addClass('btn-primary')
                    .prop('disabled', false);
            });
        }
    });

    $blogItem.find('.select2').select2({
        width: '100%'
    });

    $(document).on('change keyup', '.blog-item-form, .blog-item-editor-form', function (e) {
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

    $(document).on('submit', '.blog-item-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            return;
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
                    $blogItem.html(response.settings);
                    $blogItem.find('.select2').select2({width: '100%'});
                    notifyService.showMessage('info', 'Успех!', response.message);
                }
            },
            error: xhr => {
                if (xhr.responseJSON.errors.address) {
                    notifyService.showMessage('danger', 'Ошибка!', 'Данный адрес уже существует.');
                }
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
                notifyService.showMessage('info', 'Успех!', response.message);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('submit', '.blog-item-editor-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            return;
        }
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                notifyService.showMessage('info', 'Успех!', response.message);
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

    $(document).on('change keyup', '.blog-item-form input[id=name]', function () {
        let title = $blogItem.find('#name').val();
        $blogItem.find('#address').val(slug(title).toLowerCase());
        $blogItem.find('#metaTitle').val(title.slice(0, 27) + ((title.length > 27) ? '...' : ''));
        $blogItem.find('#metaDescription').val(title.slice(0, 57) + ((title.length > 57) ? '...' : ''));
    });
});
