<div class="row">
    <div class="col-md-12 page-item">
        <form class="tile page-item-editor-form" action="{{ route('admin.page.content.save', $page) }}" method="post">
            <h4 class="line-head">Редактор страницы</h4>

            <div class="content-group">
                <textarea id="textarea-editor" name="content">{{ $page->content ?? '' }}</textarea>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
