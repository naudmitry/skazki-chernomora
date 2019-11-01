$(function () {
    let $switchCompanies = $('.switch-companies');

    if (!$switchCompanies.length) {
        return;
    }

    $(document).on('click', '.switch-companies-perform', function (e) {
        e.preventDefault();
        let $this = $(this);
        if ($this.closest('.disabled').length) {
            return;
        }
        window.location.href = $this.attr('href');
    });
});
