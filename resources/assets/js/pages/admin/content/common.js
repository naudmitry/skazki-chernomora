let backendCommonData = JSON.parse($('.add-widgets-panel-config').text());
let settingsModule = require('./settings');

let loadingTemplate = $('.loading-template').text();
let $settingsWidgetContainer = $('.settings-widget-container');

let contentCommonService =
    {
        onWidgetOpenCallback: null,
        savePosition: function (position) {
            $.ajax({
                url: backendCommonData.sequenceWidgetUrl,
                type: 'POST',
                data: {position: position},
                success: (data) => notifyService.showMessage('info', 'Успех!', data.success),
                error: (data) => console.log(data.responseText),
            });
        },
        storeWidget: function (selectedWidget, containerId, storeWidgetUrl) {
            let blockMap =
                {
                    'top': '#media-list-target-top',
                    'middle': '#media-list-target-middle',
                    'bottom': '#media-list-target-bottom',
                };
            let $widgetsSelect = $('.select-add-block');
            $widgetsSelect.prop("disabled", true);
            $.ajax({
                url: storeWidgetUrl,
                type: 'POST',
                data: {
                    class_name: selectedWidget,
                    container: containerId
                },
                success: (data) => {
                    $widgetsSelect.find('option').remove();
                    $widgetsSelect.select2({
                        minimumResultsForSearch: Infinity,
                        data: data.availableWidgets,
                    }).prop("disabled", false);
                    let blockContainer = blockMap[data.type];
                    if (blockContainer !== undefined) {
                        let newElement = $(data.html);
                        $(blockContainer).append(newElement);
                        // $(blockContainer + ' .media:last').slideDown("slow");
                        notifyService.showMessage('info', 'Успех!', data.success);
                    }
                    contentCommonService.init();
                },
                error: (data) => {
                    notifyService.showMessage('danger', 'Ошибка!', data.responseText);
                }
            });
        },
        openSettingsWidget: function (openSettingsWidgetUrl) {
            if ($settingsWidgetContainer.data('ajax')) {
                $settingsWidgetContainer.data('ajax').abort();
            }
            $settingsWidgetContainer.html(loadingTemplate);
            $settingsWidgetContainer.data('ajax', $.ajax({
                url: openSettingsWidgetUrl,
                type: 'GET',
                success: (data) => {
                    $settingsWidgetContainer.html(data.view);
                    let $formContext = $('#setting-widget-pc');
                    settingsModule.init($formContext);

                    if (contentCommonService.onWidgetOpenCallback) {
                        contentCommonService.onWidgetOpenCallback();
                    }
                },
                error: (data) => {
                    console.log(data.responseText);
                }
            }));
        },
        enableWidget: function (url) {
            $.ajax({
                url: url,
                type: 'POST',
                success: (response) => {
                    notifyService.showMessage('info', 'Успех!', response.message);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        },
        destroyWidget: function (deleteUrl) {
            swal({
                title: "Подтвердите удаление",
                text: "Вы действительно хотите удалить виджет?",
                icon: "warning",
                buttons: ["Отмена", "Да, удалить"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    let $widgetsSelect = $('.select-add-block');
                    $widgetsSelect.prop("disabled", true);
                    $.ajax({
                        type: 'delete',
                        url: deleteUrl,
                        success: response => {
                            $widgetsSelect.find('option').remove();
                            $widgetsSelect.select2({
                                minimumResultsForSearch: Infinity,
                                data: response.availableWidgets,
                            }).prop("disabled", false);
                            $('.widgets-list-item[id=' + response.showcaseWidget.id + ']').remove();
                            notifyService.showMessage('danger', 'Успех!', response.message);
                        },
                        error: xhr => {
                            $widgetsSelect.prop("disabled", false);
                            notifyService.showMessage('danger', 'Ошибка!', data.responseText);
                        },
                    });
                    swal("Удаление подтверждено!", "Виджет будет удален.", "success");
                } else {
                    swal("Удаление отменено!", "Виджет не будет удален.", "error");
                }
            });
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

            $("#media-list-target-middle").sortable({
                zIndex: 10,
                update: function (event, ui) {
                    let position = $(this).sortable("toArray");
                    if (position.length > 0) {
                        contentCommonService.savePosition(position);
                    }
                }
            });
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
        contentCommonService.openSettingsWidget($(this).attr('href'));
    });

    $(document).on('click', '.create-widget', function (e) {
        e.preventDefault();
        let selectedWidget = $('.select-add-block option:selected').val();
        let containerId = $(this).data('container-id');
        contentCommonService.storeWidget(selectedWidget, containerId, $(this).attr('href'));
    });

    $(document).on('change', '.widget-enable', function (e) {
        e.preventDefault();
        contentCommonService.enableWidget($(this).data('href'));
    });

    settingsModule.listeners();
});

module.exports = contentCommonService;