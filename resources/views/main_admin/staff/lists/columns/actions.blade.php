<div class="btn-group">
    <a
        href="{{ route('admin.staff.list.edit') }}/@{{admin.id}}"
        class="btn btn-primary open-add-admin-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.staff.list.delete') }}/@{{admin.id}}"
        class="btn btn-primary admin-delete"
    ><i class="fas fa-trash"></i></a>

    <a
        href="{{ route('admin.staff.open-change-password-modal') }}/@{{admin.id}}"
        class="btn btn-primary open-change-password-modal"
    ><i class="fas fa-key"></i></a>
</div>