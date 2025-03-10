<div class="tile">
    <h4 class="line-head">Настройка статьи</h4>

    <form class="tab-content blog-item-form" action="{{ route('admin.blog.articles.save', $blog ?? '') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="bs-component">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Категории:</label>
                        <div class="col-md-9">
                            <select class="form-control select2" multiple name="categories[]">
                                @foreach ($categories as $category)
                                    <option
                                            @if ($blog->categories->whereIn('id', $category->id)->count()) selected @endif
                                            value="{{ $category->id }}"
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Имя для списка:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="title" name="title" value="{{ $blog->title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Название новости:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="name" name="name" value="{{ $blog->name ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Адрес статьи:</label>
                        <div class="input-group col-md-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ $administeredShowcase->getDomainPath() }}</span>
                            </div>
                            <input id="address" name="address" class="form-control" type="text" value="{{ $blog->getSlug() }}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="{{ $blog->getShowcaseUrl($administeredShowcase) }}" target="_blank">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Навигационная цепочка:</label>
                        <div class="col-md-9">
                            <input id="breadcrumbs" name="breadcrumbs" class="form-control" type="text" value="{{ $blog->breadcrumbs ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Тег TITLE:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaTitle" name="meta_title" value="{{ $blog->meta_title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Метатег DESCRIPTION:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaDescription" name="meta_description" value="{{ $blog->meta_description ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Метатег KEYWORDS:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaKeywords" name="meta_keywords" value="{{ $blog->meta_keywords ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bs-component">
                    <div class="card">
                        <div class="card-body">
                            <label class="control-label">Информация о статье</label>
                            <div class="information-container">
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-check-circle mr-2"></i>Опубликовано:
                                    </div>
                                    <div class="toggle-flip">
                                        <label class="mb-0">
                                            <input
                                                    data-href="{{ isset($blog) ? route('admin.blog.articles.enable', $blog) : '' }}"
                                                    @if ($blog->enable) checked @endif
                                                    type="checkbox"
                                                    class="checkbox entity-availability"
                                            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-star mr-2"></i>Избранное:
                                    </div>
                                    <div class="toggle-flip">
                                        <label class="mb-0">
                                            <input
                                                    data-href="{{ isset($blog) ? route('admin.blog.articles.favorite', $blog) : '' }}"
                                                    @if ($blog->favorite) checked @endif
                                                    type="checkbox"
                                                    class="checkbox entity-availability"
                                            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-calendar-check mr-2"></i>Создано:
                                    </div>
                                    <div>
                                        {{ $blog->created_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-calendar-plus mr-2"></i>Обновлено:
                                    </div>
                                    <div>
                                        {{ $blog->updated_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-plus-square mr-2"></i>Обновлен:
                                    </div>
                                    <div>
                                        {{ $blog->updater->full_name ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="fas fa-street-view mr-2"></i>Просмотрено:
                                    </div>
                                    <div>
                                        {{ $blog->view_count ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="tile-footer">
            <button class="btn btn-default" type="submit" disabled>
                <i class="fas fa-check-circle mr-2"></i>Сохранить
            </button>
        </div>
    </form>
</div>
