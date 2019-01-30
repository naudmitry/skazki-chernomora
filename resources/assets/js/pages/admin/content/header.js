$(function () {
    let $adminContentHeader = $('.admin-content-header');

    if (!$adminContentHeader.length) {
        return;
    }
    console.log('header');

    // $(document).on('click', '#widget-panel .link-open', function () {
    //     let new_link = $(this).parent().parent().find('.new_link').val();
    //     window.open($(this).data('url-prefix') + new_link, '_blank');
    // });

    let contentCommonService = require("./common");

    contentCommonService.init(false);
});