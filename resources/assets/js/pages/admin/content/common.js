let backendCommonData = JSON.parse($('.add-widgets-panel-config').text());
let contentPage = $('body').data('content-page');
let settingsModule = require('./settings');

let contentCommonService =
    {
        onWidgetOpenCallback: null,
        saveNewPosition: function (position) {
            $.ajax(
                {
                    url: backendCommonData.setPositionUrl,
                    type: 'POST',
                    data: {position: position},
                    success: (data) => notifyService.showMessage('alert', 'topRight', data.success),
                    error: (data) => console.log(data.responseText),
                });
        },
        addWidget: function (selectedWidget, containerId) {
            let blockMap =
                {
                    'top': '#media-list-target-top',
                    'middle': '#media-list-target-middle',
                    'bottom': '#media-list-target-bottom',
                };

            let $widgetsSelect = $('.select-add-block');
            $widgetsSelect.prop("disabled", true);

            $.ajax(
                {
                    url: backendCommonData.addWidgetUrl,
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

                            $(blockContainer).append(newElement);
                            $(blockContainer + ' .media:last').slideDown("slow");

                            notifyService.showMessage('info', 'Успех!', data.success);
                        }

                        contentCommonService.init();
                    },
                    error: (data) => {
                        $widgetsSelect.prop("disabled", false);
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
                            contentCommonService.vizibleOpenSetting(id);

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

            // if (isChange)
            // {
            //     $.vizitkaNotification(backendCommonData.notificationOpenWidgetSetting).notification().then(fn);
            // } else
            // {
            //     fn();
            // }
        },
        bottonOnOff: function () {
            // $('.media-list-container input.switch').bootstrapSwitch().off('switchChange.bootstrapSwitch');
            //
            // let actionFn = function(itemId, status)
            // {
            //     $.ajax(
            //     {
            //         url: backendCommonData.widgetOnOffUrl,
            //         type: 'POST',
            //         data: {
            //             id: itemId,
            //             status: status
            //         },
            //         success: (data) =>
            //         {
            //             notifyService.showMessage('alert', 'topRight', data.success);
            //         },
            //         error: (data) =>
            //         {
            //             notifyService.showMessage('error', 'topRight', data.responseText);
            //         }
            //     });
            // };
            //
            // if (contentPage === 'homepage')
            // {
            //     $("#media-list-target-top .switch")
            //         .bootstrapSwitch()
            //         .on('switchChange.bootstrapSwitch', function (event, state)
            //         {
            //             $("#media-list-target-top .switch[data-id!=" + $(this).attr("data-id") + "]").each(function (e)
            //             {
            //                 if ($(this).bootstrapSwitch('state'))
            //                 {
            //                     actionFn($(this).attr("data-id"), false);
            //                 }
            //
            //                 $(this).bootstrapSwitch('state', false, true);
            //             });
            //
            //             actionFn($(this).attr("data-id"), state);
            //         });
            // } else
            // {
            //     $('#media-list-target-top input.switch')
            //         .bootstrapSwitch()
            //         .on('switchChange.bootstrapSwitch', function ()
            //     {
            //         actionFn($(this).attr("data-id"), $(this).is(':checked'));
            //     });
            // }
            //
            // $('#media-list-target-middle input.switch, #media-list-target-bottom input.switch')
            //     .bootstrapSwitch()
            //     .on('switchChange.bootstrapSwitch', function ()
            // {
            //     actionFn($(this).attr("data-id"), $(this).is(':checked'));
            // });
        },
        removeWidget: function (id, listItem) {


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
        vizibleOpenSetting: function (id) {
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

            console.log('init');

            if (0 == $('[data-role=widgets-control-panel]').length) {
                return console.log('widgets-control-panel block not found');
            }

            this.onWidgetOpenCallback = onWidgetOpenCallback;

            $(".select2").select2({
                minimumResultsForSearch: Infinity,
                width: '100%'
            });

            // $("#media-list-target-middle").sortable({
            //     cancel: ".sortable-disabled",
            //     zIndex: 10,
            //     update: function (event, ui) {
            //         var position = $(this).sortable("toArray");
            //         if (position.length > 0) {
            //             contentCommonService.saveNewPosition(position);
            //         }
            //
            //     }
            // });

            contentCommonService.bottonOnOff();
        },
    };


$(function () {
    $(document).on('click', '.media-list-container [data-action=widget-remove]', function (e) {
        e.preventDefault();
        contentCommonService.removeWidget($(this).data("id"), $(this).closest('li.widgets-list-item'));
    });

    $(document).on('click', '.media-list-container .setting', function (e) {
        e.preventDefault();

        let $this = $(e.target).closest('.setting');

        $('body').data('current_setting_widget_id', $this.data('id'));

        contentCommonService.openSettingWidget($this.attr('href'), $this.data('id'));
    });

    // $(document).on('click', '#languages-widget .language', function (e)
    // {
    //     e.preventDefault();
    //
    //     let $this = $(e.target);
    //     var notificationChangeLanguage = $.vizitkaNotification(backendCommonData.notificationChangeLanguage);
    //
    //     let fn = function()
    //     {
    //         $('body').data('current_setting_widget_id', $this.data('id'));
    //         contentCommonService.openSettingWidget($this.attr('href'), $this.data('id'));
    //     };
    //
    //     if ($('body').data('widget-is-change')) {
    //         notificationChangeLanguage.notification().then(fn);
    //     } else {
    //         fn();
    //     }
    // });

    $(document).on('click', '#add-block-widget', function (e) {
        e.preventDefault();
        var selectedWidget = $('.select-add-block option:selected').val();
        var containerId = $(this).data('container-id');
        contentCommonService.addWidget(selectedWidget, containerId);
    });

    settingsModule.listeners();
});

module.exports = contentCommonService;