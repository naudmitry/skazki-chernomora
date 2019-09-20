$(window).on('load', function () {
    let $preLoader = $('.pace');
    let $loading = $preLoader.find('.page-loading-wrapper');

    $loading.show(600);
    $preLoader.delay(500).fadeOut('slow');
});