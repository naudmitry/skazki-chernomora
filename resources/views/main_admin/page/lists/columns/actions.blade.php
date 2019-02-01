<div class="btn-group">
    <a
        href="{{ route('admin.page.list.edit', '') }}/@{{page.id}}"
        class="btn btn-primary"
    ><i class="fas fa-edit" style="color: #FFF"></i></a>

    <a
        href="{{ route('admin.page.list.delete', '') }}/@{{page.id}}"
        class="btn btn-primary page-list-delete"
    ><i class="fas fa-trash" style="color: #FFF"></i></a>
</div>
