@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Персонал',
        'page' => 'Группы'
    ])

    <div class="row">
        <div class="col-md-6 staff-groups">
            <div class="tile">
                <h4 class="line-head">Список</h4>

                <div class="staff-groups-list" id="container">
                    @foreach ($groups as $group)
                        @include('main_admin.staff.groups.includes.item')
                    @endforeach
                </div>

                <div class="tile-footer">
                    <button
                            class="btn btn-primary staff-group-settings-open"
                            type="button"
                            href="{{ route('admin.staff.group.create') }}"
                    ><i class="fas fa-plus-circle mr-2" aria-hidden="true"></i>Добавить</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 staff-groups-settings-container"></div>
    </div>

    <script type="text/template" class="staff-group-settings-loading-template">
        @include('main_admin.includes.loading')
    </script>
@endsection
