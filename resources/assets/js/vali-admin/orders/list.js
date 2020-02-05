$(function () {
    let $orderLists = $('.order-lists');

    if (!$orderLists.length) {
        return;
    }

    let $orderListsTable = $('#orderListsTable');
    let mustacheTemplateOrderListsTableColumnCreated = $('.template-order-lists-table-column-created').text();
    let mustacheTemplateOrderListsTableColumnNumber = $('.template-order-lists-table-column-number').text();
    let mustacheTemplateOrderListsTableColumnStatus = $('.template-order-lists-table-column-status').text();
    let mustacheTemplateOrderListsTableColumnDate = $('.template-order-lists-table-column-date').text();
    let mustacheTemplateOrderListsTableColumnSessions = $('.template-order-lists-table-column-sessions').text();
    let mustacheTemplateOrderListsTableColumnSaltCave = $('.template-order-lists-table-column-salt-cave').text();
    let mustacheTemplateOrderListsTableColumnCost = $('.template-order-lists-table-column-cost').text();
    let mustacheTemplateOrderListsTableColumnPaid = $('.template-order-lists-table-column-paid').text();
    let mustacheTemplateOrderListsTableColumnActions = $('.template-order-lists-table-column-actions').text();

    $orderListsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $orderListsTable.data('href'),
            },
        columnDefs: [
            {
                targets: 0,
                data: 'created_at',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnCreated, {order}),
            },
            {
                targets: 1,
                data: 'name',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnNumber.replace(/@orderId/g, order.id), {order}),
            },
            {
                targets: 2,
                data: 'phone_number',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnStatus, {order}),
            },
            {
                targets: 3,
                data: 'email',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnDate, {order}),
            },
            {
                targets: 4,
                data: 'desired_at',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnSessions, {order}),
            },
            {
                targets: 5,
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnSaltCave, {order}),
            },
            {
                targets: 6,
                data: 'cost',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnCost, {order}),
            },
            {
                targets: 7,
                data: 'paid',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnPaid, {order}),
            },
            {
                targets: 8,
                orderable: false,
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnActions.replace(/@orderId/g, order.id), {order}),
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
            $('.orders-count').text(settings.json.counters.orders_count);
            $('.orders-paid').text(settings.json.counters.orders_paid);
        },
    });

    $('.dataTables_length select', $orderLists).select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('click', '.item-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить заказ?",
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        notifyService.showMessage('danger', 'Успех!', response.message);
                        $orderListsTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Заказ будет удален.", "success");
            } else {
                swal("Удаление отменено!", "Заказ не будет удалены.", "error");
            }
        });
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#orderListsTable').DataTable().search(this.value).draw();
        }
    });
});