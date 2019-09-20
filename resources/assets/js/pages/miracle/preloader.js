$(window).on('load', function () {
    let $preLoader = $('.pace');
    let $loading = $preLoader.find('.page-loading-wrapper');

    $loading.fadeIn('slow');
    $preLoader.delay(500).fadeOut('slow');
});