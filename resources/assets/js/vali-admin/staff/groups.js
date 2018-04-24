$(function () {
    let $staffGroups = $('.staff-groups');

    if (!$staffGroups.length) {
        return;
    }

    let $staffGroupsSettingsContainer = $('.staff-groups-settings-container');
    let staffGroupSettingsLoadingTemplate = $('.staff-group-settings-loading-template').text();
    let $staffGroupsList = $('.staff-groups-list');
    let isChange = false;

    $(document).on('click', '.staff-group-settings-open', function (e) {
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
        if ($staffGroupsSettingsContainer.data('ajax')) {
            $staffGroupsSettingsContainer.data('ajax').abort();
        }
        $staffGroupsSettingsContainer.html(staffGroupSettingsLoadingTemplate);
        $staffGroupsSettingsContainer.data('ajax', $.ajax({
            type: 'get',
            url: href,
            cache: false,
            success: response => {
                $staffGroupsSettingsContainer.html(response);
            },
            error: xhr => {
                if (xhr.statusText == 'abort') {
                    return;
                }
                console.error(xhr);
                $staffGroupsSettingsContainer.empty();
            },
            complete: () => {
                $staffGroupsSettingsContainer.removeData('ajax');
            },
        }));
    }

    $(document).on('click', '.staff-group-delete', function (e) {
        e.preventDefault();
        let $this = $(this);
        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить группу?",
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        let $staffGroupsListItem =
                            $staffGroupsList.find('.staff-groups-list-item[data-staff-group-id="' + response.group.id + '"]');
                        let $staffGroupSettingsContainer = $('.staff-group-settings-container');
                        if ($staffGroupSettingsContainer.data('group-id') == response.group.id) {
                            $staffGroupsSettingsContainer.empty();
                        }
                        $staffGroupsListItem.remove();
                        isChange = false;
                        notifyService.showMessage('danger', 'Успех!', response.message);
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Группа будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Группа не будет удалена.", "error");
            }
        });
    });

    $(document).on('submit', '.staff-group-settings-form', function (e) {
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
                let $staffGroupsListItem =
                    $staffGroupsList.find('.staff-groups-list-item[data-staff-group-id="' + response.group.id + '"]');
                if ($staffGroupsListItem.length) {
                    $staffGroupsListItem.replaceWith(response.row);
                }
                else {
                    $staffGroupsList.append(response.row);
                }
                $staffGroupsSettingsContainer.html(response.settings);
                notifyService.showMessage('info', 'Успех!', response.message);
                isChange = false;
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
});
