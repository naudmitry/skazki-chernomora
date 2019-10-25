<div class="btn-group">
    <a
        href="{{ route('admin.organization.edit', '') }}/@{{organization.id}}"
        class="btn btn-primary open-edit-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.organization.delete', '') }}/@{{organization.id}}"
        class="btn btn-primary organization-delete"
    ><i class="fas fa-trash"></i></a>
</div>
