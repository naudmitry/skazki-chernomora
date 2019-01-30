// import tinymceConfig from '../../common/tinymceConfig';

let backendCommonData = JSON.parse($('.add-widgets-panel-config').text());

// current widget id
let getWidgetId = () => { return $('#widget-setting').data('id') };

let getWidgetName = () => { return $('#widget-setting').data('widget-name') };

let scriptModule = 
{
    text: undefined,

    isValidate: undefined,

    start_setting: undefined,

    init: function($context)
    {
        $context = $context ? $context : $(document);

        scriptModule.start_setting = scriptModule.getSettingsArray();

        console.log('scriptModule:init');

        $('body').data('widget-is-change', false);

        scriptModule.validate($('#widget-panel'));

        $context.find('.tokenfield-setting').tokenfield();

        $context.find('.styled').uniform();
        $context.find('.select').select2({
            minimumResultsForSearch: Infinity
        });

        $context.find(".switch").bootstrapSwitch();

        // Format icon
        let select2IconFormat = function (icon)
        {
            if ( ! icon.id) {
                return icon.text;
            }
            return "<i class='backicon-" + $(icon.element).data('icon') + "'></i>" + icon.text;
        };

        $context.find(".select-icons").select2({
            templateResult: select2IconFormat,
            templateSelection: select2IconFormat,
            escapeMarkup: function (m) {
                return m;
            }
        });

        $context.find('textarea[data-field-type="textarea-editor"]').each(function()
        {
            let $this = $(this);

            let currentEditor = tinymce.get($this.attr('id'));

            if(currentEditor)
            {
                currentEditor.remove();
            }

            tinymce.init(Object.assign({
                target: this,
                setup: function (editor)
                {
                    editor.on('keyup change', function (e) {
                        scriptModule.text = tinyMCE.activeEditor.getContent();
                        scriptModule.unBlockBtn();
                    });
                }
            }, tinymceConfig));
        });

        //end Format icon

        $context.find('[data-lightbox="image"]').magnificPopup(
            {
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                mainClass: 'mfp-no-margins mfp-fade',
                image: {verticalFit: true},
            });

        $context.find(".file-input").each(function () {
            var $this = $(this);

            let inputExtra = $this.data('extra');

            $this.fileinput
            ({
                browseLabel: backendCommonData.fileinputBrowseLabel,
                browseIcon: '<i class="icon-file-plus"></i>',
                uploadIcon: '<i class="icon-file-upload2"></i>',
                removeIcon: '<i class="icon-cross3"></i>',
                uploadAsync: false,
                showUpload: false, // hide upload button
                showRemove: false, // hide remove button
                minFileCount: 1,
                maxFileCount: 5,
                uploadUrl: backendCommonData.uploadImageWidgetUrl,
                uploadExtraData: (inputExtra ? inputExtra : {}),
            }).on('filebatchuploadsuccess', function (event, data, previewId, index)
            {
                let linkInputSelector = $(this).data('link-field');

                if(linkInputSelector)
                {
                    $(linkInputSelector).attr("href", data.response.url);
                }

                let imageInputSelector = $(this).data('image-field');

                if(imageInputSelector)
                {
                    $(imageInputSelector).attr("src", data.response.url);
                }

                let videoSelector = $(this).data('video-field');
                if(videoSelector)
                {
                    $(videoSelector).attr('href', data.response.url).show();
                }

                $($(this).data('input-field')).val(data.response.hash);

                scriptModule.updateBtnChange();
            }).on("filebatchselected", function (event, files)
            {
                let $this = $(this);
                if ($this.data('size')) {
                    for (let fileIndex in files) {
                        if (files[fileIndex].size > $this.data('size')) {
                            $this.fileinput('clear');
                            notifyService.showMessage('error', 'topRight', $this.data('size-message'));
                            return;
                        }
                    }
                }
                $(this).fileinput("upload");
            });
        });

        $context.find("#accordion-target").sortable({
            handle: ".handle",
            zIndex: 10,
            update: function (event, ui) {
                console.log('accordion-target unlock');
                scriptModule.unBlockBtn();
            }
        });

        $context.find('[data-action=product-search], [data-action=product-category-search]').each(function(index, el)
        {
            let showcase = $(el).data('showcase');
            let searchUrl = $(el).data("url");

            $(el).select2(
                {
                    ajax:
                        {
                            url: searchUrl,
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    q: params.term,
                                    page: params.page,
                                    showcase: showcase
                                };
                            },
                            processResults: function(data, params) {
                                params.page = params.page || 1;
                                return {
                                    results: data.data,
                                    pagination: {
                                        more: (params.page * data.per_page) < data.total
                                    }
                                };
                            },
                            cache: true
                        },
                    minimumInputLength: 1,
                    escapeMarkup: (markup) => markup,
                    templateResult: (item) => item.title,
                    templateSelection: (item) => item.title || item.text,
                    casesensitive: false
                });
        });

        $('.lightbox-attacment-video').magnificPopup({type: 'iframe'});

        $(document).on('input', '[data-field="widget:sites-list-title"]', function () {
            let $currentPanel = $(this).closest('.panel'), $formWidgetPanel = $('#form-widget-panel');

            let oldTitle = $currentPanel.find('.sites-list-panel-title').text(),
                newTitle = $(this).val(),
                data = [];

            $formWidgetPanel.find('.panel').each(function() {
                let $parentLink = $(this).find('[data-field="widget:sites-list-parent-link"]');
                let settingsTitle = $(this).find('.setting-title').text();

                $currentPanel.find('.sites-list-panel-title').text(newTitle);

                $formWidgetPanel.find('.panel').each(function(index) {
                    data[index] = $(this).find('.setting-title').text();
                });

                if ($parentLink.val() === oldTitle) {
                    $parentLink.select2("destroy").find('option[value="' + $parentLink.val() + '"]').remove();
                    $parentLink.select2({
                        'data' : $.grep(data, function(value) { return value !== settingsTitle; }),
                        minimumResultsForSearch: Infinity
                    }).val(newTitle).trigger('change');
                }
                else {
                    let oldVal = $parentLink.val();
                    $parentLink.select2("destroy").find('option[value="' + oldTitle + '"]').remove();
                    $parentLink.select2({
                        'data' : $.grep(data, function(value) { return value !== settingsTitle; }),
                        minimumResultsForSearch: Infinity
                    }).val(oldVal).trigger('change');
                }
            });
        });
    },

    listeners: function()
    {
        $(document).on('click', '#setting-widget-pc .panel [data-action=close]', function (e)
        {
            e.preventDefault();
            let $panel = $(this).closest('.panel');

            $.vizitkaNotification(backendCommonData.notificationRemoveWidgetItem)
                .notification()
                .then(function ()
            {
                let $formWidgetPanel = $('#form-widget-panel');
                let isSitesList = $formWidgetPanel.data('sites-list');

                if (isSitesList) {
                    var deleteTitlePanel = $panel.find('.setting-title').text();
                }

                $panel.slideUp(150, function ()
                {
                    $panel.remove();
                    scriptModule.updateBtnChange();

                    if (isSitesList) {
                        $formWidgetPanel.find('.panel').each(function() {
                            let data = [];
                            $formWidgetPanel.find('.panel').each(function(index) {
                                data[index] = $(this).find('.setting-title').text();
                            });
                            $formWidgetPanel.find('.panel').each(function() {
                                let text = $(this).find('.setting-title').text();
                                $(this).find('.select').each(function() {
                                    let value = $(this).val();
                                    $(this).select2("destroy").find('option[value="' + deleteTitlePanel + '"]').remove();
                                    $(this).select2({
                                        'data' : $.grep(data, function(value) { return value !== text; }),
                                        minimumResultsForSearch: Infinity
                                    }).val(value === deleteTitlePanel ? 'no' : value).trigger('change');
                                });
                            });
                        });
                    }
                });
            });
        });

        $(document).on('select2:select', '#setting-widget-pc.select[data-setting=category]', function () {
            $(this).closest('.panel').find('.select[data-setting=product]').select2("val", "0");
        });

        $(document).on('select2:select', '#setting-widget-pc .select[data-setting=product]', function () {
            $(this).closest('.panel').find('.select[data-setting=category]').select2("val", "0");
        });

        $(document).on('click', '#setting-widget-pc #widget-panel .save-setting', function (e) {
            e.preventDefault();
            scriptModule.saveSetting();
        });

        $(document).on('click', '#setting-widget-pc #widget-panel #add_block', function () {
            var name_block = $(this).attr('data-name');
            scriptModule.addBlock(name_block);
        });

        $(document).on('input change switchChange.bootstrapSwitch', '#setting-widget-pc #widget-panel', function () {
            scriptModule.updateBtnChange();
            scriptModule.validate(this);
        });

        $(document).on('select2:select', '[data-action=product-search], [data-action=product-category-search]', function (e) {
            let $el = $(e.target);
            $($el.data('dependent-item')).val(0).trigger("change");
        });

        $(document).on('switchChange.bootstrapSwitch', '#setting-widget-pc .quick-products-order-switch', function (e) {
            let productsBlock = $(this).closest('#widget-panel').find('[data-role=quick-order-products-block]');
            productsBlock.toggle($(this).is(':checked'));
        });

        $(document).on('switchChange.bootstrapSwitch', '#setting-widget-pc .is-all-available-height', function (e) {
            let heightBlock = $(this).closest('#widget-panel').find('[data-role=height-block]');
            heightBlock.toggle(!$(this).is(':checked'));
        });

        $(document).on('switchChange.bootstrapSwitch', '#setting-widget-pc .is-all-available-width', function (e) {
            let widthBlock = $(this).closest('#widget-panel').find('[data-role=width-block]');
            widthBlock.toggle(!$(this).is(':checked'));
        });

        let runAnimate = function($elem, animate) {
            $elem.removeClass().addClass(animate + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass();
            });
        };

        $(document).on('change', '.text-effect', function() {
            let anim = $(this).val();
            let $elem = $(this).closest('.form-group').find('label').find('span');
            runAnimate($elem, anim);
        });

        $(document).on('click', '.run-effect', function() {
            let anim = $(this).closest('.form-group').find('.text-effect').val();
            let $elem = $(this).closest('.form-group').find('label').find('span');
            runAnimate($elem, anim);
        });
    },

    addBlock: function(name_block)
    {
        let widgetId = $('body').data('current_setting_widget_id');
        let position = $('#setting-widget-pc .widget-iterable-panel').length;

        $.ajax(
        {
            url: backendCommonData.widgetAddBlockUrl,
            type: 'POST',
            data: {
                position: position,
                name_block: name_block,
                widget_id: widgetId,
            },
            success: (data) =>
            {
                let blockContext = $(data.success).appendTo("#setting-widget-pc #accordion-target");
                scriptModule.init(blockContext);
                scriptModule.updateBtnChange();
                scriptModule.validate($('#setting-widget-pc #accordion-target'));

                let $formWidgetPanel = $('#form-widget-panel');
                let isSitesList = $formWidgetPanel.data('sites-list');

                if (isSitesList) {
                    let data = [];
                    $formWidgetPanel.find('.panel').each(function(index) {
                        data[index] = $(this).find('.setting-title').text();
                    });
                    $formWidgetPanel.find('.panel').each(function() {
                        let text = $(this).find('.setting-title').text();
                        $(this).find('.select').each(function() {
                            let value = $(this).val();
                            $(this).select2({
                                'data' : $.grep(data, function(value) { return value != text; }),
                                minimumResultsForSearch: Infinity
                            }).val(value).trigger('change');
                        });
                    });
                }
            },
            error: (data) =>
            {
                console.log(data.responseText);
            }
        });
    },

    updateBtnChange: function ()
    {
        if(scriptModule.start_setting == scriptModule.getSettingsArray())
        {
            $('body').data('widget-is-change', false);
            scriptModule.blockBtn();
        }else{
            $('body').data('widget-is-change', true);
            scriptModule.unBlockBtn();
        }
    },

    blockBtn: function()
    {
        $('.save-setting').attr('disabled', 'disabled').removeClass().addClass('btn btn-default save-setting pull-right');
    },

    unBlockBtn: function()
    {
        $('.save-setting').removeAttr('disabled').removeClass().addClass('btn btn-primary save-setting pull-right');
    },

    validate: function(element)
    {
        let invalidFieldsCount = 0;
        $(element).find('.validate').closest('.panel-white').removeClass('validate');
        $(element).find('.required').each(function ()
        {
            if (this.value.trim() == '')
            {
                invalidFieldsCount++;
                $(this).removeClass('validate').addClass('validate');
                $(this).closest('.panel-white').removeClass('validate').addClass('validate');
            } else
            {
                $(this).removeClass('validate');
            }
        });
        $(element).find('.widget-setting-validate-url').each(function () {
            let isValidUrl;
            try {
                new URL(this.value.trim());
                isValidUrl = true;
            } catch (exception) {
                isValidUrl = false;
            }
            if (this.value.trim() && !isValidUrl) {
                invalidFieldsCount++;
                $(this).removeClass('validate').addClass('validate');
                $(this).closest('.panel-white').removeClass('validate').addClass('validate');
            } else {
                $(this).removeClass('validate');
            }
        });

        scriptModule.isValidate = invalidFieldsCount == 0;

        if (scriptModule.isValidate)
        {
            $(element).find('.validate').closest('.panel-white').removeClass('validate');
        } else
        {
            scriptModule.blockBtn();
        }

        return scriptModule.isValidate;
    },

    getSettingsArray: function ()
    {
        let obj_all = {};
        let arr_all = [];
        $('#setting-widget-pc #accordion-target .panel').each(function ()
        {
            let arr = {};
            $(this).find(".widget-setting").each(function ()
            {
                let setting = $(this).attr('data-setting');
                if ($(this).attr('type') == "checkbox")
                {
                    arr[setting] = $(this).is(':checked');
                } else {
                    arr[setting] = $(this).val();
                }
            }); //each  setting
            arr_all.push(arr);
        }); //each panel
        if (arr_all.length > 0)
        {
            obj_all['items'] = arr_all;
        }

        $('#form-widget-panel').each(function ()
        {
            $(this).find(".widget-setting").each(function ()
            {
                if($(this).closest('#accordion-target').length)
                {
                    return;
                }

                let setting = $(this).attr('data-setting');
                if ($(this).attr('type') == "checkbox")
                {
                    obj_all[setting] = $(this).is(':checked');
                } else if (setting === 'text')
                {
                    obj_all[setting] = scriptModule.text;
                } else
                {
                    obj_all[setting] = $(this).val();
                    if($(this).is('select[multiple]') && obj_all[setting] === null)
                    {
                        obj_all[setting] = [];
                    }
                }
            });
        });
        return JSON.stringify(obj_all);
    },

    saveSetting: function ()
    {
        if ( !scriptModule.isValidate)
        {
            notifyService.showMessage('error', 'topRight', backendCommonData.l10n.validationRequiredError);
            return;
        }

        scriptModule.blockBtn();

        $.ajax(
        {
            url: backendCommonData.widgetSaveUrl + getWidgetId(),
            type: 'PUT',
            data: {
                setting: scriptModule.getSettingsArray(),
            },
            success: (data) =>
            {
                $('body').data('widget-is-change', false);
                notifyService.showMessage('alert', 'topRight', data.success);

                let $formContext = null;
                if (mobile)
                {
                    $formContext = $('#modal_default');
                    $formContext.find('.modal-body').remove();
                    $formContext.find('.modal-header').after('<div class="modal-body">' + data.settings_html + '</div>');
                    $formContext.modal('show');
                    toogle_menu();
                } else
                {
                    $formContext = $('#setting-widget-pc');
                    $formContext.find('.setting-widget').remove();
                    $formContext.append('<div class="panel panel-flat setting-widget">' + data.settings_html + '</div>');
                }
                scriptModule.init($formContext);
            },
            error: (data) =>
            {
                let errorMessage = data.responseJSON.errors_html ? data.responseJSON.errors_html : data.responseText;
                notifyService.showMessage('error', 'topRight', errorMessage);
            }
        });
    },

};

module.exports = scriptModule;
