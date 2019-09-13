$(function () {
    let $reviews = $('.reviews');

    if (!$reviews.length) {
        return;
    }

    let $reviewsTable = $('#reviewsTable');

    let mustacheTemplateReviewsTableColumnActions = $('.template-reviews-table-column-actions').text();
    let mustacheTemplateReviewsTableColumnCreated = $('.template-reviews-table-column-created').text();
    let mustacheTemplateReviewsTableColumnRating = $('.template-reviews-table-column-rating').text();
    let mustacheTemplateReviewsTableColumnReview = $('.template-reviews-table-column-review').text();
    let mustacheTemplateReviewsTableColumnShow = $('.template-reviews-table-column-show').text();
    let mustacheTemplateReviewsTableColumnStatus = $('.template-reviews-table-column-status').text();
    let mustacheTemplateReviewsTableColumnUser = $('.template-reviews-table-column-user').text();

    $reviewsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $reviewsTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, review) => Mustache.render(mustacheTemplateReviewsTableColumnCreated, {review}),
            },
            {
                targets: 1,
                render: (data, type, review) => Mustache.render(mustacheTemplateReviewsTableColumnStatus, {review}),
            },
            {
                targets: 2,
                render: (data, type, review) => Mustache.render(mustacheTemplateReviewsTableColumnUser, {review}),
            },
            {
                targets: 3,
                render: (data, type, review) => Mustache.render(mustacheTemplateReviewsTableColumnRating, {review}),
            },
            {
                targets: 4,
                render: (data, type, review) => Mustache.render(mustacheTemplateReviewsTableColumnReview, {review}),
            },
            {
                targets: 5,
                sortable: false,
                render: (data, type, review) => Mustache.render(mustacheTemplateReviewsTableColumnShow, {review}),
            },
            {
                targets: 6,
                orderable: false,
                render: (data, type, review) => Mustache.render(mustacheTemplateReviewsTableColumnActions, {review}),
            },
        ],
        order: [[0, 'desc']],
        dom: '<"datatable-scroll-lg"t><"datatable-footer"ilp>',
        language: {
            processing: "Подождите...",
            search: "Поиск:",
            lengthMenu: "Показать: _MENU_",
            info: "Записи с _START_ до _END_ из _TOTAL_ записей",
            infoEmpty: "Записи с 0 до 0 из 0 записей",
            infoFiltered: "(отфильтровано из _MAX_ записей)",
            infoPostFix: "",
            loadingRecords: "Загрузка записей...",
            zeroRecords: "Записи отсутствуют.",
            emptyTable: "В таблице отсутствуют данные",
            paginate: {
                previous: "←",
                next: "→",
            }
        },
        lengthMenu: [15, 25, 50, 75, 100],
        displayLength: 15,
        drawCallback: function (settings) {
            $('.negative-count').text(settings.json.counters.negative_count);
            $('.positive-count').text(settings.json.counters.positive_count);
            $('.average-rating').text(settings.json.counters.average_rating);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#reviewsTable').DataTable().search(this.value).draw();
        }
    });

    $(document).on('click', '.review-delete', function (e) {
        e.preventDefault();
        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить отзыв?",
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $(this).attr('href'),
                    success: response => {
                        notifyService.showMessage('danger', 'Успех!', response.message);
                        $reviewsTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Отзыв будет удален.", "success");
            } else {
                swal("Удаление отменено!", "Отзыв не будет удален.", "error");
            }
        });
    });

    $(document).on('click', '.open-review-modal', function (e) {
        e.preventDefault();
        let $this = $(this);
        if ($this.data('ajax')) {
            return;
        }
        let $divForModal = $('.div-for-modal');
        $this.data('ajax', $.ajax({
            url: $this.attr('href'),
            success: response => {
                $divForModal.html(response.view);
                let $modal = $('#review-modal');
                $modal.find('.select2').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                });
                $modal.modal('show');
                $modal.on('hidden.bs.modal', function (event) {
                    $divForModal.empty();
                });
            },
            error: xhr => {
                console.error(xhr);
            },
            complete: () => $this.removeData('ajax'),
        }));
    });

    $(document).on('change keyup', '.review-create-form', function (e) {
        let $form = $(this);
        let $input = $(e.target);
        if (!$input.is('input,select,textarea')) {
            return;
        }
        $form.find('[type=submit]')
            .removeClass('btn-default')
            .addClass('btn-primary')
            .prop('disabled', false);
    });

    $(document).on('submit', '.review-create-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        if ($form.data('ajax')) {
            return;
        }
        let $modal = $form.closest('#review-modal');
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                notifyService.showMessage('info', 'Успех!', response.message);
                $reviewsTable.DataTable().ajax.reload();
                $modal.modal('hide');
            },
            error: xhr => {
                if ('object' === typeof xhr.responseJSON) {
                    for (let key in xhr.responseJSON['errors']) {
                        $form.find('[name="' + key + '"]').addClass('is-invalid');
                    }
                    return;
                }
                console.error(xhr);
            },
            complete: () => {
                $form.removeData('ajax');
            },
        }));
    });

    $(document).on('change', '.review-widgeted', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'post',
            success: (response) => {
                notifyService.showMessage('info', 'Успех!', response.message);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});