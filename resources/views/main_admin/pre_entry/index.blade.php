@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Заказы',
        'page' => 'Запись на прием'
    ])

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body datatable-scroll-lg">
                    <table class="table table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>ФИО</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Дата</th>
                            <th>Соляная пещера</th>
                            <th>Тип</th>
                            <th>Сообщение</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($preEntries as $preEntry)
                                <tr>
                                    <td>{{ $preEntry->created_at }}</td>
                                    <td>{{ $preEntry->full_name }}</td>
                                    <td>{{ $preEntry->phone_number }}</td>
                                    <td>{{ $preEntry->email }}</td>
                                    <td>{{ $preEntry->desired_date }}</td>
                                    <td>{{ $preEntry->saltCave->title }}</td>
                                    <td>{{ \App\Classes\TypeVisitEnum::$labels[$preEntry->type] }}</td>
                                    <td>{{ $preEntry->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection