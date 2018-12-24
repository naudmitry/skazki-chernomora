@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Администратор',
        'page' => 'Роли'
    ])

    <div class="row">
        <div class="col-md-6 admin-roles">
            <div class="tile">
                <h4 class="line-head">Роли</h4>

                <div class="admin-roles-list" id="container">
                    @foreach ($roles as $role)
                        @include('main_admin.roles.includes.item')
                    @endforeach
                </div>

                <div class="tile-footer">
                    <button
                            class="btn btn-primary admin-role-settings-open"
                            type="button"
                            href="{{ route('admin.role.edit') }}"
                    ><i class="fa fa-fw fa-lg fa-plus-circle" aria-hidden="true"></i>Добавить</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 admin-roles-settings-container"></div>
    </div>

    <script type="text/template" class="admin-role-settings-loading-template">
        @include('main_admin.roles.includes.loading')
    </script>
@endsection