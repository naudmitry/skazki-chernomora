$(function () {
    let $geoIpTab = $('.geo-ip-tab');

    if (!$geoIpTab.length) {
        return;
    }

    let namePanel = function (country, region, city) {
        return country ? (region ? (city ? (country + '-' + region + '-' + city) : (country + '-' + region)) : country) : 'Все страны-Все регионы-Все города';
    };

    let changeNamePanel = function($panel) {
        let $region = $panel.find('[data-field="general:geo-ip-region"]');

        let country = $panel.find('[data-field="general:geo-ip-country"]').val(),
            region = $region.find('option[value="' + $region.val() + '"]').data('value-name'),
            city = $panel.find('[data-field="general:geo-ip-city"]').val();

        $panel.find('.geo-ip-panel-title').text(namePanel(country, region, city));
    };

    let syncFormWithGeoIpFieldsValues = () => {
        let $settingsGeneralForm = $('.settings-general-form');

        let isEnabled = $settingsGeneralForm
            .find('[name="general:is-use-geo-ip"]')
            .prop('checked');

        let $components = $settingsGeneralForm
            .find('[data-field="general:geo-ip-items"], [data-field="general:create-geo-ip-rule"]');

        isEnabled ? $components.show() : $components.hide();
    };

    let init = () => {
        syncFormWithGeoIpFieldsValues();

        $geoIpTab.find('.select2').select2({minimumResultsForSearch: Infinity, width: '100%'});
        $geoIpTab.find('.select2-with-search').select2({minimumInputLength: 2, width: '100%'});

        $geoIpTab.find('.card').each(function() {
            changeNamePanel($(this));
        });
    };

    init();

    $(document).on('change', '.checkbox', function (e) {
        syncFormWithGeoIpFieldsValues();
    });

    let $accordion = $('.accordion');
    let position = $accordion.find('.card').length;

    $(document).on('click', '[data-field="general:create-geo-ip-rule"]', function (e) {
        e.preventDefault();
        $.ajax(
            {
                url: $(this).attr('href'),
                type: 'get',
                data: {
                    position: position,
                },
                success: (response) => {
                    $accordion.append(response);
                    let $panel = $accordion.find('.card').last();

                    $panel.find('.select2').select2({
                        minimumResultsForSearch: Infinity,
                        width: '100%'
                    });

                    $panel.find('.select2-with-search').select2({
                        minimumInputLength: 2,
                        width: '100%',
                    });

                    changeNamePanel($panel);

                    let btn = $('form.settings-general-form button[type=submit]');
                    btn.removeAttr('disabled').removeClass('btn-default').addClass('btn-primary');

                    position++;
                },
                error: xhr => {
                    console.error(xhr);
                }
            });
    });

    $(document).on('click', '#accordionExample [data-action=close]', function (e) {
        e.preventDefault();
        let $panel = $(this).closest('.card');

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить настройку geo-ip?",
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then(value => {
            if (value) {
                $panel.remove();
                let btn = $('form.settings-general-form button[type=submit]');
                btn.removeAttr('disabled').removeClass('btn-default').addClass('btn-primary');
            }
        });
    });

    $(document).on('select2:select', '[data-field="general:geo-ip-country"]', function () {
        let $panel = $(this).closest('.card');
        let $regionFormGroup = $panel.find('[data-field="general:geo-ip-region"]').closest('.form-group');
        let $cityFormGroup = $panel.find('[data-field="general:geo-ip-city"]').closest('.form-group');
        $.ajax({
            url: $(this).attr('href') + '/' + $(this).find('option[value="' + $(this).val() + '"]').data('country-id'),
            type: 'GET',
            success: (response) => {
                $regionFormGroup.replaceWith(response.region);
                $cityFormGroup.replaceWith(response.city);
            },
            complete: function () {
                $panel.find('.select2-with-search')
                    .select2({minimumInputLength: 2, width: '100%'});

                changeNamePanel($panel);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('select2:select', '[data-field="general:geo-ip-region"]', function () {
        let $panel = $(this).closest('.card');
        let $cityFormGroup = $panel.find('[data-field="general:geo-ip-city"]').closest('.form-group');
        $.ajax({
            url: $(this).attr('href') + '/' + $(this).find('option[value="' + $(this).val() + '"]').data('region-id'),
            type: 'get',
            success: (response) => {
                $cityFormGroup.replaceWith(response);
            },
            complete: function () {
                $panel.find('.select2-with-search').select2({minimumInputLength: 2, width: '100%'});
                changeNamePanel($panel);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('select2:select', '[data-field="general:geo-ip-city"]', function () {
        changeNamePanel($(this).closest('.card'));
    });

    $(document).on('click', '.link-open', function () {
        window.open($(this).closest('.form-group').find('.geo-ip-redirect-link').val().toString(), '_blank');
    });
});