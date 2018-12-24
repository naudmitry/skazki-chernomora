<div class="admin-roles-list-item list-items-container" data-admin-role-id="{{ $role->id }}">
    <div class="toggle-flip title-center">
        <p class="title dragula-handle" style="margin-bottom: 0;">{{ $role->title }}</p>
    </div>

    <div class="btn-group">
        <a
            class="btn btn-primary admin-role-settings-open"
            href="{{ route('admin.role.edit', $role) }}"
        ><i class="fa fa-lg fa-edit"></i></a>

        <a
            class="btn btn-primary admin-role-delete"
            href="{{ route('admin.role.delete', $role) }}"
        ><i class="fa fa-lg fa-trash"></i></a>
    </div>
</div>
