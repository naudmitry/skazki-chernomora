<div class="tile">
    <h3 class="tile-title">Настройки категории</h3>

    <div class="tile-body">
        <form class="form-horizontal page-category-settings-form" action="{{ route('admin.page.category.save', $category) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4">Название для списка:</label>
                <div class="col-md-8">
                    <input name="title" class="form-control" type="text" value="{{ $category->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Название категории:</label>
                <div class="col-md-8">
                    <input id="name" name="name" class="form-control" type="text" value="{{ $category->name ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Адрес категории:</label>
                <div class="input-group col-md-8">
                    <input id="address" name="address" class="form-control" type="text" value="{{ $category->getSlug() }}">
                    @if(isset($category->id))
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <a href="{{ $category->getShowcaseUrl() }}" target="_blank">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Тег TITLE:</label>
                <div class="col-md-8">
                    <input id="metaTitle" name="meta_title" class="form-control" type="text" value="{{ $category->meta_title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Метатег DESCRIPTION:</label>
                <div class="col-md-8">
                    <input id="metaDescription" name="meta_description" class="form-control" type="text" value="{{ $category->meta_description ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Метатег KEYWORDS:</label>
                <div class="col-md-8">
                    <input id="metaKeywords" name="meta_keywords" class="form-control" type="text" value="{{ $category->meta_keywords ?? '' }}">
                </div>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
