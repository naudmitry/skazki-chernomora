$(function () {
    let $adminContentHeader = $('.admin-content-header');

    if (!$adminContentHeader.length) {
        return;
    }

    let contentCommonService = require("./common");

    contentCommonService.init(false);
});