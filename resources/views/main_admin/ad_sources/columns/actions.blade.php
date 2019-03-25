<div class="btn-group">
    <a
        href="{{ route('admin.ad-source.list.edit', '') }}/@{{source.id}}"
        class="btn btn-primary open-edit-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.ad-source.list.delete', '') }}/@{{source.id}}"
        class="btn btn-primary ad-source-list-delete"
    ><i class="fas fa-trash"></i></a>
</div>
