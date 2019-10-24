<div class="btn-group">
    <a
        href="{{ route('admin.buyers.edit', '') }}/@{{buyer.id}}"
        class="btn btn-primary"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.buyers.destroy', '') }}/@{{buyer.id}}"
        class="btn btn-primary buyer-list-delete"
    ><i class="fas fa-trash"></i></a>
</div>