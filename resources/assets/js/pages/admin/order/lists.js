$(function () {
    let $orderLists = $('.order-lists');

    if (!$orderLists.length) {
        return;
    }

    let $orderListsTable = $('#orderListsTable');
    let mustacheTemplateOrderListsTableColumnCreated = $('.template-order-lists-table-column-created').text();
    let mustacheTemplateOrderListsTableColumnName = $('.template-order-lists-table-column-name').text();
    let mustacheTemplateOrderListsTableColumnPhoneNumber = $('.template-order-lists-table-column-phone-number').text();
    let mustacheTemplateOrderListsTableColumnEmail = $('.template-order-lists-table-column-email').text();
    let mustacheTemplateOrderListsTableColumnDesiredDate = $('.template-order-lists-table-column-desired-date').text();
    let mustacheTemplateOrderListsTableColumnSaltCave = $('.template-order-lists-table-column-salt-cave').text();
    let mustacheTemplateOrderListsTableColumnType = $('.template-order-lists-table-column-type').text();
    let mustacheTemplateOrderListsTableColumnMessage = $('.template-order-lists-table-column-message').text();
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
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnName, {order}),
            },
            {
                targets: 2,
                data: 'phone_number',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnPhoneNumber, {order}),
            },
            {
                targets: 3,
                data: 'email',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnEmail, {order}),
            },
            {
                targets: 4,
                data: 'desired_date',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnDesiredDate, {order}),
            },
            {
                targets: 5,
                data: 'salt_cave',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnSaltCave, {order}),
            },
            {
                targets: 6,
                data: 'type',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnType, {order}),
            },
            {
                targets: 7,
                data: 'message',
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnMessage, {order}),
            },
            {
                targets: 8,
                orderable: false,
                render: (data, type, order) => Mustache.render(mustacheTemplateOrderListsTableColumnActions, {order}),
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
        displayLength: 15
    });

    $(document).on('click', '.order-list-delete', function (e) {
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
});