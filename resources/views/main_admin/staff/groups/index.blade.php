@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Персонал',
        'page' => 'Группы'
    ])

    <div class="row">
        <div class="col-md-6 blog-categories">
            <div class="tile">
                <h3 class="tile-title">Список групп</h3>

                <div class="blog-categories-list" id="container">
                    @foreach ($groups as $group)
                        @include('main_admin.staff.groups.includes.item')
                    @endforeach
                </div>

                <div class="tile-footer">
                    <button
                            class="btn btn-primary staff-group-settings-open"
                            type="button"
                            href="{{ route('admin.staff.group.create') }}"
                    ><i class="fa fa-fw fa-lg fa-plus-circle" aria-hidden="true"></i>Добавить группу</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 staff-groups-settings-container"></div>
    </div>

    <script type="text/template" class="staff-group-settings-loading-template">
        @include('main_admin.staff.groups.includes.loading')
    </script>
@endsection
