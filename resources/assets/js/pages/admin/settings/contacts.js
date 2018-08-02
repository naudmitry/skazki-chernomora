$(function () {
    let $contactsTab = $('.contacts-tab');

    if (!$contactsTab.length) {
        return;
    }

    $(document).on('click', '.contacts-address-add', function (e) {
        e.preventDefault();
        let $this = $(this);

        let $addressContainer = $contactsTab.find('.address-container');
        let itemTemplate = $contactsTab.find('.template-contacts-address-item').text();
        $addressContainer.append(itemTemplate);

        updateBlockAddress();
    });

    $(document).on('click', '.contacts-phone-add', function (e) {
        e.preventDefault();
        let $this = $(this);

        let $phoneContainer = $contactsTab.find('.phone-container');
        let itemTemplate = $contactsTab.find('.template-contacts-phone-item').text();
        $phoneContainer.append(itemTemplate);

        updateBlockPhone();
    });

    let updateBlockAddress = function () {
        $(".address-container").each(function () {
            let k = 1;
            $(this).find(".address-number").each(function () {
                $(this).html(k);
                k = k + 1;
            });
        });
    };

    let updateBlockPhone = function () {
        $(".phone-container").each(function () {
            let k = 1;
            $(this).find(".phone-number").each(function () {
                $(this).html(k);
                k = k + 1;
            });
        });
    };

    updateBlockPhone();
    updateBlockAddress();
});
