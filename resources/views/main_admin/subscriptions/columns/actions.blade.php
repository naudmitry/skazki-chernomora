<div class="btn-group">
    <a
        href="{{ route('admin.subscription.edit', '') }}/@{{subscription.id}}"
        class="btn btn-primary open-edit-modal"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.subscription.delete', '') }}/@{{subscription.id}}"
        class="btn btn-primary subscription-delete"
    ><i class="fas fa-trash"></i></a>
</div>
