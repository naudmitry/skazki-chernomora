<div class="col-md-12 children-list">
    <div class="tile">
        <div class="tile-body mb-4">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <a href="{{ route('admin.children.create', $buyer) }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>Добавить
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon">
                        <div class="circle-icon">
                            <i class="far fa-file-alt"></i>
                        </div>
                        <div class="info">
                            <p class="count">0</p>
                            <p>записей</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon">
                        <div class="circle-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="info">
                            <p class="paid">0</p>
                            <p>оплаченных</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-2">
                    <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                </div>
            </div>
        </div>

        <div class="tile-body datatable-scroll-lg">
            <table class="table table-hover" id="childrenTable" data-href="{{ route('admin.children.index', $buyer) }}">
                <thead>
                <tr>
                    <th>Полное имя</th>
                    <th>Дата рождения</th>
                    <th>Возраст</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@php $columns = [] @endphp
@php $columns[] =['name' => 'full-name', 'view' => 'full_name'] @endphp
@php $columns[] =['name' => 'birthday', 'view' => 'birthday'] @endphp
@php $columns[] =['name' => 'age', 'view' => 'age'] @endphp

@foreach($columns as $column)
    <script type="application/x-tmpl-mustache" class="template-children-table-column-{{ $column['name'] }}">
        @include('main_admin.children.columns.' . $column['view'])
    </script>
@endforeach