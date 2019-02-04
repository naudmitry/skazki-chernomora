let backendCommonData = JSON.parse($('.add-widgets-panel-config').text());
let contentPage = $('body').data('content-page');
let settingsModule = require('./settings');

let contentCommonService =
    {
        onWidgetOpenCallback: null,
        saveNewPosition: function (position) {
            $.ajax(
                {
                    url: backendCommonData.sequenceWidgetUrl,
                    type: 'POST',
                    data: {position: position},
                    success: (data) => notifyService.showMessage('info', 'Успех!', data.success),
                    error: (data) => console.log(data.responseText),
                });
        },
        storeWidget: function (selectedWidget, containerId, storeUrl) {
            let blockMap =
                {
                    'top': '#media-list-target-top',
                    'middle': '#media-list-target-middle',
                    'bottom': '#media-list-target-bottom',
                };

            let $widgetsSelect = $('.select-add-block');

            $.ajax(
                {
                    url: storeUrl,
                    type: 'POST',
                    data: {
                        class_name: selectedWidget,
                        container: containerId
                    },
                    success: (data) => {
                        $widgetsSelect.find('option').remove();

                        $widgetsSelect.select2(
                            {
                                minimumResultsForSearch: Infinity,
                                data: data.availableWidgets,
                            })
                            .prop("disabled", false);

                        let blockContainer = blockMap[data.type];

                        if (blockContainer !== undefined) {
                            let newElement = $(data.html);
                            newElement.hide();

                            console.log('blockContainer', blockContainer);

                            $(blockContainer).append(newElement);
                            $(blockContainer + ' .media:last').slideDown("slow");

                            notifyService.showMessage('info', 'Успех!', data.success);
                        }

                        contentCommonService.init();
                    },
                    error: (data) => {
                        notifyService.showMessage('danger', 'Ошибка!', data.responseText);
                    }
                });
        },
        openSettingWidget: function (url, id) {
            let isChange = false;
            let fn = function () {
                $.ajax(
                    {
                        url: url,
                        type: 'GET',
                        success: (data) => {
                            let $formContext = null;
                            if (mobile) {
                                $formContext = $('#modal_default');
                                $formContext.find('.modal-body').remove();
                                $formContext.find('.modal-header').after('<div class="modal-body">' + data.success + '</div>');
                                $formContext.modal('show');
                                toogle_menu();
                            } else {
                                $formContext = $('#setting-widget-pc');

                                $formContext.find('textarea[data-field-type="textarea-editor"]').each((index, el) => tinymce.get($(el).attr('id')).remove());

                                $formContext.find('.setting-widget').remove();

                                $formContext.append('<div class="panel panel-flat setting-widget">' + data.success + '</div>');
                            }
                            contentCommonService.visibleOpenSetting(id);

                            settingsModule.init($formContext);

                            if (contentCommonService.onWidgetOpenCallback) {
                                contentCommonService.onWidgetOpenCallback();
                            }
                        },
                        error: (data) => {
                            console.log(data.responseText);
                        }
                    });
            };
        },
        enableWidget: function () {
            $.ajax({
                url: $(this).data('href'),
                type: 'POST',
                success: (response) => {
                    notifyService.showMessage('info', 'Успех!', response.message);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        },
        destroyWidget: function (id, listItem, deleteUrl) {
            swal({
                title: "Подтвердите удаление",
                text: "Вы действительно хотите удалить виджет?",
                icon: "warning",
                buttons: ["Отмена", "Да, удалить"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    let $widgetsSelect = $('.select-add-block');
                    $.ajax({
                        type: 'delete',
                        url: deleteUrl,
                        success: response => {
                            $widgetsSelect.find('option').remove();
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

            // $.vizitkaNotification(backendCommonData.notificationRemoveWidget)
            //     .notification()
            //     .then(function () {
            //         let $widgetsSelect = $('.select-add-block');
            //         $widgetsSelect.prop("disabled", true);
            //
            //         listItem.slideUp("slow", () => listItem.remove());
            //
            //         // if setting open, close window
            //         if ($('body').data('current_setting_widget_id') == id)
            //         {
            //             $('#setting-widget-pc .setting-widget').remove();
            //         }
            //
            //         $.ajax({
            //             url: backendCommonData.widgetDestroyUrl + id,
            //             type: 'DELETE',
            //             success: (data) =>
            //             {
            //                 $widgetsSelect.find('option').remove();
            //
            //                 $widgetsSelect.select2(
            //                     {
            //                         minimumResultsForSearch: Infinity,
            //                         data: data.availableWidgets,
            //                     })
            //                     .prop("disabled", false);
            //
            //                 notifyService.showMessage('alert', 'topRight', data.success);
            //
            //                 var position = $("#media-list-target-middle").sortable("toArray");
            //                 if (position.length > 0)
            //                 {
            //                     contentCommonService.saveNewPosition(position);
            //                 }
            //             },
            //             error: (data) =>
            //             {
            //                 $widgetsSelect.prop("disabled", false);
            //                 notifyService.showMessage('error', 'topRight', data.responseText);
            //             }
            //         });
            //     });
        },
        visibleOpenSetting: function (id) {
            // let current_id_onOffSelection = $('body').data('current_id_onOffSelection');
            // if(current_id_onOffSelection)
            // {
            //     $('#' + current_id_onOffSelection + ' > .media-body').css("color", "");
            //     $('#' + current_id_onOffSelection + ' > .media-right').css("color", "");
            //     $('#' + current_id_onOffSelection + ' > .media-body > .media-heading').css("color", "");
            // }
            //
            // $('#' + id + ' > .media-body').css("color", "#2196f3");
            // $('#' + id + ' > .media-right').css("color", "#2196f3");
            // $('#' + id + ' > .media-body > .media-heading').css("color", "#2196f3");
            //
            // $('body').data('current_id_onOffSelection', id);
        },
        init: function (onWidgetOpenCallback) {
            if (0 === $('[data-role=widgets-control-panel]').length) {
                return console.log('widgets-control-panel block not found');
            }

            this.onWidgetOpenCallback = onWidgetOpenCallback;

            $(".select2").select2({
                minimumResultsForSearch: Infinity,
                width: '100%'
            });

            contentCommonService.enableWidget();
        },
    };


$(function () {
    $(document).on('click', '.widget-destroy', function (e) {
        e.preventDefault();
        contentCommonService.destroyWidget($(this).attr('href'));
    });

    $(document).on('click', '.widget-settings-open', function (e) {
        e.preventDefault();
        let $this = $(e.target).closest('.setting');
        $('body').data('current_setting_widget_id', $this.data('id'));
        contentCommonService.openSettingWidget($this.attr('href'), $this.data('id'));
    });

    $(document).on('click', '.create-widget', function (e) {
        e.preventDefault();
        let selectedWidget = $('.select-add-block option:selected').val();
        let containerId = $(this).data('container-id');
        contentCommonService.storeWidget(selectedWidget, containerId, $(this).attr('href'));
    });

    settingsModule.listeners();
});

module.exports = contentCommonService;