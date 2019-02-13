<div class="tile page-category-settings-container" data-category-id="{{ $category->id ?? '' }}">
    <h4 class="line-head">Настройки категории</h4>

    <div class="tile-body">
        <form class="form-horizontal page-category-settings-form" action="{{ route('admin.page.category.save', $category) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="categoryTitle">Название для списка:</label>
                <div class="col-md-8">
                    <input id="categoryTitle" name="title" class="form-control" type="text" value="{{ $category->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="categoryName">Название категории:</label>
                <div class="col-md-8">
                    <input id="categoryName" name="name" class="form-control" type="text" value="{{ $category->name ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="categoryAddress">Адрес категории:</label>
                <div class="input-group col-md-8">
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{ $administeredShowcase->getDomainPath() }}</span>
                    </div>
                    <input id="categoryAddress" name="address" class="form-control" type="text" value="{{ $category->getSlug() }}">
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
                <label class="control-label col-md-4" for="categoryMetaTitle">Тег TITLE:</label>
                <div class="col-md-8">
                    <input id="categoryMetaTitle" name="meta_title" class="form-control" type="text" value="{{ $category->meta_title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="categoryMetaDescription">Метатег DESCRIPTION:</label>
                <div class="col-md-8">
                    <input id="categoryMetaDescription" name="meta_description" class="form-control" type="text" value="{{ $category->meta_description ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="categoryMetaKeywords">Метатег KEYWORDS:</label>
                <div class="col-md-8">
                    <input id="categoryMetaKeywords" name="meta_keywords" class="form-control" type="text" value="{{ $category->meta_keywords ?? '' }}">
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
