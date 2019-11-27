<div class="btn-group">
    <a
        href="{{ route('admin.page.list.edit', '') }}/@{{page.id}}"
        class="btn btn-primary"
    ><i class="fas fa-edit"></i></a>

    <a
        href="{{ route('admin.page.list.delete', '') }}/@{{page.id}}"
        class="btn btn-primary page-article-delete"
    ><i class="fas fa-trash"></i></a>
</div>
