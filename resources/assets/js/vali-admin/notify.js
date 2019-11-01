var NotifyService = {
    showMessage: function (type, title, text) {
        $.notify({
            title: title,
            message: text,
            icon: 'fa fa-check'
        }, {
            type: type,
            placement: {
                from: "top",
                align: "right",
            },
        });
    },
};

module.exports = NotifyService;