<div class="btn-group">
    <a
        href="{{ route('admin.diagnosis.list.edit', '') }}/@{{diagnosis.id}}"
        class="btn btn-primary open-edit-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.diagnosis.list.delete', '') }}/@{{diagnosis.id}}"
        class="btn btn-primary diagnosis-list-delete"
    ><i class="fas fa-trash"></i></a>
</div>
