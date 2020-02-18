$(function () {
    let $childrenTable = $('#childrenTable');

    if (!$childrenTable.length) {
        return;
    }

    let mustacheTemplateChildrenTableColumnFullName = $('.template-children-table-column-full-name').text();
    let mustacheTemplateChildrenTableColumnBirthday = $('.template-children-table-column-birthday').text();
    let mustacheTemplateChildrenTableColumnAge = $('.template-children-table-column-age').text();

    $childrenTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: $childrenTable.data('href'),
        },
        columnDefs: [
            {
                targets: 0,
                render: (data, type, child) => Mustache.render(mustacheTemplateChildrenTableColumnFullName.replace(/@buyerId/g, child.buyer.id).replace(/@childId/g, child.id), {child}),
            },
            {
                targets: 1,
                render: (data, type, child) => Mustache.render(mustacheTemplateChildrenTableColumnBirthday, {child}),
            },
            {
                targets: 2,
                render: (data, type, child) => Mustache.render(mustacheTemplateChildrenTableColumnAge, {child}),
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
    });

    $('.dataTables_length select', '.children-list').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
});