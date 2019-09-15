<div class="admin-roles-list-item list-items-container" data-admin-role-id="{{ $role->id }}">
    <div class="toggle-flip title-center">
        <p class="title dragula-handle" style="margin-bottom: 0;">{{ $role->title }}</p>
    </div>

    <div class="btn-group">
        <a
            class="btn btn-primary admin-role-settings-open"
            href="{{ route('admin.staff.role.edit', $role) }}"
        ><i class="fas fa-edit"></i></a>

        <a
            class="btn btn-primary admin-role-delete"
            href="{{ route('admin.staff.role.delete', $role) }}"
        ><i class="fas fa-trash"></i></a>
    </div>
</div>
