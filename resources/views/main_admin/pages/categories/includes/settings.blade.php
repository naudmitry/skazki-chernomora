<div class="tile page-category-settings-container" data-category-id="{{ $category->id ?? '' }}">
    <h4 class="line-head">Настройки категории</h4>

    <div class="tile-body">
        <form autocomplete="off" class="form-horizontal page-category-settings-form" action="{{ route('admin.page.category.save', $category) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="title">Название для списка:</label>
                <div class="col-md-8">
                    <input id="title" name="title" class="form-control" type="text" value="{{ $category->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="name">Название категории:</label>
                <div class="col-md-8">
                    <input id="name" name="name" class="form-control" type="text" value="{{ $category->name ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="image_link">Ссылка на картинку:</label>
                <div class="col-md-8">
                    <input id="image_link" name="image_link" class="form-control" type="text" value="{{ $category->image_link ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="color">Цвет текста заголовка:</label>
                <div class="col-md-8">
                    <input id="color" name="color" class="form-control" type="color" value="{{ $category->color ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="address">Адрес категории:</label>
                <div class="input-group col-md-8">
                    <div class="input-group-prepend d-none d-md-block">
                        <span class="input-group-text">{{ $administeredShowcase->getDomainPath() }}</span>
                    </div>
                    <input id="address" name="address" class="form-control" type="text" value="{{ $category->getSlug() }}">
                    @if(isset($category->id))
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <a href="{{ $category->getShowcaseUrl($administeredShowcase) }}" target="_blank">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="metaTitle">Тег TITLE:</label>
                <div class="col-md-8">
                    <input id="metaTitle" name="meta_title" class="form-control" type="text" value="{{ $category->meta_title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="metaDescription">Метатег DESCRIPTION:</label>
                <div class="col-md-8">
                    <input id="metaDescription" name="meta_description" class="form-control" type="text" value="{{ $category->meta_description ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="metaKeywords">Метатег KEYWORDS:</label>
                <div class="col-md-8">
                    <input id="metaKeywords" name="meta_keywords" class="form-control" type="text" value="{{ $category->meta_keywords ?? '' }}">
                </div>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
