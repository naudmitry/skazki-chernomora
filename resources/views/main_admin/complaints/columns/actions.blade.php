<div class="btn-group">
    <a
        href="{{ route('admin.complaint.list.edit', '') }}/@{{complaint.id}}"
        class="btn btn-primary open-edit-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.complaint.list.delete', '') }}/@{{complaint.id}}"
        class="btn btn-primary complaint-delete"
    ><i class="fas fa-trash"></i></a>
</div>
