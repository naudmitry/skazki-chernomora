$(function () {
    let $buyersLists = $('.buyers-lists');

    if (!$buyersLists.length) {
        return;
    }

    let $buyersListsTable = $('#buyersListsTable');
    let mustacheTemplateBuyersListsTableColumnActions = $('.template-buyers-lists-table-column-actions').text();
    let mustacheTemplateBuyersListsTableColumnPhone = $('.template-buyers-lists-table-column-phone').text();
    let mustacheTemplateBuyersListsTableColumnStatus = $('.template-buyers-lists-table-column-status').text();
    let mustacheTemplateBuyersListsTableColumnOrders = $('.template-buyers-lists-table-column-orders').text();
    let mustacheTemplateBuyersListsTableColumnOrdersSum = $('.template-buyers-lists-table-column-orders-sum').text();
    let mustacheTemplateBuyersListsTableColumnLogin = $('.template-buyers-lists-table-column-login').text();
    let mustacheTemplateBuyersListsTableColumnUser = $('.template-buyers-lists-table-column-user').text();
    let mustacheTemplateBuyersListsTableColumnCreated = $('.template-buyers-lists-table-column-created').text();

    $buyersListsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $buyersListsTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                // data: 'created_at',
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnCreated, {buyer}),
            },
            {
                targets: 1,
                // data: 'name',
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnUser, {buyer}),
            },
            {
                targets: 2,
                // data: 'phone',
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnPhone, {buyer}),
            },
            {
                targets: 3,
                // data: 'login_at',
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnLogin, {buyer}),
            },
            {
                targets: 4,
                // data: 'statuses',
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnStatus, {buyer}),
            },
            {
                targets: 5,
                // data: 'stat_orders',
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnOrders, {buyer}),
            },
            {
                targets: 6,
                // data: 'stat_orders_sum',
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnOrdersSum, {buyer}),
            },
            {
                targets: 7,
                orderable: false,
                render: (data, type, buyer) => Mustache.render(mustacheTemplateBuyersListsTableColumnActions, {buyer}),
            },
        ],
        order: [[0, 'asc']],
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
            // $('.enable-news-count').text(settings.json.counters.enable_news_count);
            // $('.view-count-total').text(settings.json.counters.view_count_total);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    // $(document).on('keyup', '.search', function (e) {
    //     if (e.keyCode == 13) {
    //         $('#blogArticlesTable').DataTable().search(this.value).draw();
    //     }
    // });

    // $(document).on('change', '.checkbox', function () {
    //     $.ajax({
    //         url: $(this).data('href'),
    //         type: 'post',
    //         success: (response) => {
    //             notifyService.showMessage('info', 'Успех!', response.message);
    //         },
    //         error: function (data) {
    //             console.log(data);
    //         }
    //     });
    // });

    // $(document).on('click', '.blog-article-delete', function (e) {
    //     e.preventDefault();
    //     let $this = $(this);
    //
    //     swal({
    //         title: "Подтвердите удаление",
    //         text: "Вы действительно хотите удалить статью?",
    //         icon: "warning",
    //         buttons: ["Отмена", "Да, удалить"],
    //         dangerMode: true,
    //     }).then((willDelete) => {
    //         if (willDelete) {
    //             $.ajax({
    //                 type: 'delete',
    //                 url: $this.attr('href'),
    //                 success: response => {
    //                     notifyService.showMessage('danger', 'Успех!', response.message);
    //                     $buyersListsTable.DataTable().ajax.reload();
    //                 },
    //                 error: xhr => {
    //                     console.error(xhr);
    //                 },
    //             });
    //
    //             swal("Удаление подтверждено!", "Статья будет удалена.", "success");
    //         } else {
    //             swal("Удаление отменено!", "Статья не будет удалена.", "error");
    //         }
    //     });
    // });
});
