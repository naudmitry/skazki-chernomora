$(function () {
    let $adminRoles = $('.admin-roles');

    if (!$adminRoles.length) {
        return;
    }

    let $adminRolesSettingsContainer = $('.admin-roles-settings-container');
    let adminRoleSettingsLoadingTemplate = $('.admin-role-settings-loading-template').text();
    let $adminRolesList = $('.admin-roles-list');
    let isChange = false;

    $(document).on('click', '.admin-role-settings-open', function (e) {
        e.preventDefault();
        let $this = $(this);

        if (isChange) {
            swal({
                title: "Вы действительно уверены?",
                text: "Данные, которые не были сохранены, будут удалены.",
                icon: "warning",
                buttons: ["Отмена", "Ок"],
                dangerMode: true,
            }).then(value => {
                if (value) {
                    swal("Изменение подтверждено!", "Данные будут изменены.", "success");
                    isChange = false;
                    edit($this.attr('href'));
                } else {
                    swal("Изменение отменено!", "Данные не будут изменены.", "error");
                }
            });
        }
        else {
            edit($this.attr('href'));
        }
    });

    function edit(href) {
        if ($adminRolesSettingsContainer.data('ajax')) {
            $adminRolesSettingsContainer.data('ajax').abort();
        }
        $adminRolesSettingsContainer.html(adminRoleSettingsLoadingTemplate);
        $adminRolesSettingsContainer.data('ajax', $.ajax({
            type: 'get',
            url: href,
            cache: false,
            success: response => {
                $adminRolesSettingsContainer.html(response);
            },
            error: xhr => {
                if (xhr.statusText == 'abort') {
                    return;
                }
                console.error(xhr);
                $adminRolesSettingsContainer.empty();
            },
            complete: () => {
                $adminRolesSettingsContainer.removeData('ajax');
            },
        }));
    }

    $(document).on('change keyup switchChange.bootstrapSwitch', '.admin-role-settings-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);
        if (!$input.is('input')) {
            return;
        }
        if ((e.type == 'keyup') && ($input.attr('type') != 'text')) {
            return;
        }
        $input.closest('.form-group')
            .removeClass('has-error');
        $form.find('[type=submit]')
            .removeClass('btn-default')
            .addClass('btn-primary')
            .prop('disabled', false);
    });

    $(document).on('submit', '.admin-role-settings-form', function (e) {
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
                let $adminRolesListItem =
                    $adminRolesList.find('.admin-roles-list-item[data-admin-role-id="' + response.role.id + '"]');
                if ($adminRolesListItem.length) {
                    $adminRolesListItem.replaceWith(response.row);
                }
                else {
                    $adminRolesList.append(response.row);
                }
                $adminRolesSettingsContainer.html(response.settings);
                isChange = false;
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

    $(document).on('click', '.admin-role-delete', function (e) {
        e.preventDefault();
        let $this = $(this);
        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить роль?",
            icon: "warning",
            buttons: ["Отмена", "Удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        let $adminRolesListItem =
                            $adminRolesList.find('.admin-roles-list-item[data-admin-role-id="' + response.role.id + '"]');
                        let $adminRoleSettingsContainer = $('.admin-role-settings-container');
                        if ($adminRoleSettingsContainer.data('admin-role-id') == response.role.id) {
                            $adminRolesSettingsContainer.empty();
                        }
                        $adminRolesListItem.remove();
                        isChange = false;
                        notifyService.showMessage('danger', 'Успех!', response.message);
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Категория будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Категория не будет удалена.", "error");
            }
        });
    });
});