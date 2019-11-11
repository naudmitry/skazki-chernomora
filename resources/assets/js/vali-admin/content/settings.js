let scriptModule =
    {
        text: [],
        isValidate: undefined,
        start_setting: undefined,

        init: function ($context) {
            $context = $context ? $context : $(document);

            scriptModule.start_setting = scriptModule.getSettingsArray();
            // $('body').data('widget-is-change', false);

            // scriptModule.validate($('#widget-panel'));

            function formatState (state) {
                if (!state.id) {
                    return state.text;
                }
                return ($(state.element).data('with-icons').toString() === 'true')
                    ? $('<span><i class="fab fa-' + $(state.element).data('icon') + ' has-circle"></i> ' + state.text + '</span>')
                    : state.text;
            }

            $context.find('.select2').select2({
                minimumResultsForSearch: Infinity,
                width: '100%',
                templateResult: formatState,
                templateSelection: formatState,
                allowHtml: true
            });

            $context.find("#accordionExample").sortable({
                zIndex: 10,
                update: function (event, ui) {
                    scriptModule.unBlockBtn();
                }
            });

            $context.find('textarea[data-field-type="textarea-editor"]').each(function () {
                let $this = $(this);
                let currentEditor = tinymce.get($this.attr('id'));
                if(currentEditor)
                {
                    currentEditor.remove();
                }
                tinymce.init({
                    target: this,
                    language: 'ru',
                    plugins: "link image imagetools code",
                    setup: function (editor) {
                        editor.on('keyup change', function (e) {
                            scriptModule.text[this.id] = tinyMCE.activeEditor.getContent();
                            scriptModule.unBlockBtn();
                        });
                    }
                });
            });
        },

        listeners: function () {
            $(document).on('click', '#setting-widget-pc .card [data-action=close]', function (e) {
                e.preventDefault();
                let $panel = $(this).closest('.card');
                $panel.remove();
                scriptModule.updateBtnChange();
            });

            $(document).on('click', '#setting-widget-pc #widget-panel .save-settings', function (e) {
                e.preventDefault();
                scriptModule.saveSetting();
            });

            $(document).on('click', '#setting-widget-pc #widget-panel #add_block', function () {
                scriptModule.addBlock($(this).attr('href'));
            });

            $(document).on('input change switchChange.bootstrapSwitch', '#setting-widget-pc #widget-panel', function () {
                scriptModule.updateBtnChange();
                // scriptModule.validate(this);
            });
        },

        addBlock: function (url) {
            let position = $('#setting-widget-pc .card').length;

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    position: position
                },
                success: (data) => {
                    let blockContext = $(data.success).appendTo("#setting-widget-pc #accordionExample");
                    scriptModule.init(blockContext);
                    scriptModule.updateBtnChange();
                    // scriptModule.validate($('#setting-widget-pc #accordion-target'));
                },
                error: (data) => {
                    console.log(data.responseText);
                }
            });
        },

        updateBtnChange: function () {
            if (scriptModule.start_setting == scriptModule.getSettingsArray()) {
                // $('body').data('widget-is-change', false);
                scriptModule.blockBtn();
            } else {
                // $('body').data('widget-is-change', true);
                scriptModule.unBlockBtn();
            }
        },

        blockBtn: function () {
            $('.save-settings').attr('disabled', 'disabled').removeClass('btn-primary').addClass('btn-default');
        },

        unBlockBtn: function () {
            $('.save-settings').removeAttr('disabled').removeClass('btn-default').addClass('btn-primary');
        },

        validate: function (element) {
            // let invalidFieldsCount = 0;
            // $(element).find('.validate').closest('.panel-white').removeClass('validate');
            // $(element).find('.required').each(function () {
            //     if (this.value.trim() == '') {
            //         invalidFieldsCount++;
            //         $(this).removeClass('validate').addClass('validate');
            //         $(this).closest('.panel-white').removeClass('validate').addClass('validate');
            //     } else {
            //         $(this).removeClass('validate');
            //     }
            // });
            // $(element).find('.widget-setting-validate-url').each(function () {
            //     let isValidUrl;
            //     try {
            //         new URL(this.value.trim());
            //         isValidUrl = true;
            //     } catch (exception) {
            //         isValidUrl = false;
            //     }
            //     if (this.value.trim() && !isValidUrl) {
            //         invalidFieldsCount++;
            //         $(this).removeClass('validate').addClass('validate');
            //         $(this).closest('.panel-white').removeClass('validate').addClass('validate');
            //     } else {
            //         $(this).removeClass('validate');
            //     }
            // });
            //
            // scriptModule.isValidate = invalidFieldsCount == 0;
            //
            // if (scriptModule.isValidate) {
            //     $(element).find('.validate').closest('.panel-white').removeClass('validate');
            // } else {
            //     scriptModule.blockBtn();
            // }
            //
            // return scriptModule.isValidate;
        },

        getSettingsArray: function () {
            let obj_all = {};
            let arr_all = [];

            $('#setting-widget-pc #accordionExample .card').each(function () {
                let arr = {};
                $(this).find(".widget-setting").each(function () {
                    let setting = $(this).attr('data-setting');
                    if ($(this).attr('type') === "checkbox") {
                        arr[setting] = $(this).is(':checked');
                    } else if (setting === 'text') {
                        arr[setting] = scriptModule.text[$(this).attr('id')];
                    } else {
                        arr[setting] = $(this).val();
                    }
                });
                arr_all.push(arr);
            });

            if (arr_all.length > 0) {
                obj_all['items'] = arr_all;
            }

            $('#form-widget-panel').each(function () {
                $(this).find(".widget-setting").each(function () {
                    if ($(this).closest('#accordionExample').length) {
                        return;
                    }
                    let setting = $(this).attr('data-setting');
                    if ($(this).attr('type') === "checkbox") {
                        obj_all[setting] = $(this).is(':checked');
                    } else if (setting === 'text') {
                        obj_all[setting] = scriptModule.text[$(this).attr('id')];
                    } else {
                        obj_all[setting] = $(this).val();
                        if ($(this).is('select[multiple]') && obj_all[setting] === null) {
                            obj_all[setting] = [];
                        }
                    }
                });
            });

            return JSON.stringify(obj_all);
        },

        saveSetting: function () {
            // if (!scriptModule.isValidate) {
            //     notifyService.showMessage('danger', 'Ошибка!', 'Данные не прошли валидацию.');
            //     return;
            // }

            let $form = $('.widget-settings-form');
            scriptModule.blockBtn();

            $.ajax({
                url: $form.attr('action'),
                type: 'put',
                data: {
                    setting: scriptModule.getSettingsArray(),
                },
                success: (data) => {
                    // $('body').data('widget-is-change', false);
                    notifyService.showMessage('info', 'Успех!', data.message);
                    let $widgetPanel = $('#widget-panel');
                    $widgetPanel.replaceWith(data.view);
                    let $formContext = $('#setting-widget-pc');
                    scriptModule.init($formContext);
                },
                error: (data) => {
                    let errorMessage = data.responseJSON.message ? data.responseJSON.message : data.responseText;
                    notifyService.showMessage('danger', 'Ошибка!', errorMessage);
                }
            });
        },
    };

module.exports = scriptModule;