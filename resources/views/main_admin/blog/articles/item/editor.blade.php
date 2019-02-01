<div class="row">
    <div class="col-md-12 blog-article">
        <form class="tile blog-item-editor-form" action="{{ route('admin.blog.article.save.content', $blog) }}" method="post">
            <h4 class="line-head">Редактор статьи</h4>

            <div class="form-group row">
                <label class="control-label col-md-2">Ссылка на фото:</label>
                <div class="col-md-6">
                    <input class="form-control" id="link" name="link" value="{{ $blog->link ?? '' }}">
                </div>
            </div>

            <div class="content-group">
                <textarea id="textarea-editor" name="content">{{ $blog->content ?? '' }}</textarea>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
