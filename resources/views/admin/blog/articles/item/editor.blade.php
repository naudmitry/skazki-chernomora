<div class="row">
    <div class="col-md-12 blog-article">
        <form class="tile blog-item-editor-form" action="{{ route('admin.blog.article.save.content', $blog) }}" method="post">
            <h3 class="tile-title">Редактор статьи</h3>

            <div class="content-group">
                <textarea id="textarea-editor" name="content">{{ $blog->content ?? '' }}</textarea>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fa fa-fw fa-lg fa-check-circle"></i> Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
