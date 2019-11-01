$(function () {
    $(".app-nav__item, .app-notification__item").click(function (event) {
        if ($(event.target).is('i.button-link-target-blank')) {
            event.preventDefault();
            event.stopImmediatePropagation();
            let href = $(event.target).data('href');
            window.open(href);
        }
    });
});
