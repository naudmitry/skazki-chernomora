<div class="btn-group">
    <a
        href="{{ route('admin.page.list.edit', '') }}/@{{page.id}}"
        class="btn btn-primary"
    ><i class="fa fa-lg fa-edit" style="color: #FFF"></i></a>

    <a
        href="{{ route('admin.page.list.delete', '') }}/@{{page.id}}"
        class="btn btn-primary page-list-delete"
    ><i class="fa fa-lg fa-trash" style="color: #FFF"></i></a>
</div>
