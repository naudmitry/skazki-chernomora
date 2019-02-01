<div class="btn-group">
    <a
        href="{{ route('admin.blog.article.edit', '') }}/@{{blog.id}}"
        class="btn btn-primary"
    ><i class="fas fa-edit" style="color: #FFF"></i></a>

    <a
        href="{{ route('admin.blog.article.delete', '') }}/@{{blog.id}}"
        class="btn btn-primary blog-article-delete"
    ><i class="fas fa-trash" style="color: #FFF"></i></a>
</div>
