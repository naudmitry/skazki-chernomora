<div class="tile">
    <h4 class="line-head">Настройка страницы</h4>

    <form class="tab-content page-item-form" action="{{ route('admin.page.list.save', $page) }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="bs-component">
                    <div class="form-group row">
                        <label class="control-label col-md-3" for="category">Категория:</label>
                        <div class="col-md-9">
                            <select id="category" class="form-control select2" name="category_id">
                                @foreach ($categories as $category)
                                    <option
                                            @if ($page->category->id == $category->id) selected @endif
                                            value="{{ $category->id }}"
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="title">Имя для списка:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="title" name="title" value="{{ $page->title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="name">Название страницы:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="name" name="name" value="{{ $page->name ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="address">Адрес категории:</label>
                        <div class="input-group col-md-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ $administeredShowcase->getDomainPath() }}</span>
                            </div>
                            <input id="address" name="address" class="form-control" type="text" value="{{ $page->getSlug() }}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="{{ $page->getShowcaseUrl($administeredShowcase) }}" target="_blank">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="metaTitle">Тег TITLE:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaTitle" name="meta_title" value="{{ $page->meta_title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="metaDescription">Метатег DESCRIPTION:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaDescription" name="meta_description" value="{{ $page->meta_description ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="metaKeywords">Метатег KEYWORDS:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaKeywords" name="meta_keywords" value="{{ $page->meta_keywords ?? '' }}">
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
                                    <div class="toggle-flip" style="height: 30px;">
                                        <label>
                                            <input
                                                    data-href="{{ isset($page) ? route('admin.page.list.enable', $page) : '' }}"
                                                    @if ($page->enable) checked @endif
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
                                        {{ $page->created_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-calendar-plus mr-2"></i>Обновлено:
                                    </div>
                                    <div>
                                        {{ $page->updated_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-plus-square mr-2"></i>Обновлен:
                                    </div>
                                    <div>
                                        {{ $page->updater->name ?? '' }} {{ $page->updater->surname ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="fas fa-street-view mr-2"></i>Просмотрено:
                                    </div>
                                    <div>
                                        {{ $page->view_count ?? 0 }}
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
