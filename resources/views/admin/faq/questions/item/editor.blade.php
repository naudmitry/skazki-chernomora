<div class="row">
        <div class="col-md-12 faq-question">
        <form
                class="tile faq-item-editor-form"
                action="{{ route('admin.faq.question.save.content', $faq) }}"
                method="post"
        >
            <div class="page-header">
                <h2 class="mb-3 line-head">Редактор ответа</h2>
            </div>

            <div class="content-group">
                <textarea id="textarea-editor" name="content">{{ $faq->content ?? '' }}</textarea>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fa fa-fw fa-lg fa-check-circle"></i> Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
