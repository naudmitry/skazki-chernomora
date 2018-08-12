<div class="row page-settings">
    <div class="col-md-12">
        <div class="tile">
            <div class="page-header">
                <h2 class="mb-3 line-head">Настройки страницы</h2>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="bs-component">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#generalSettings">Общие настройки</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#seo">Настройки SEO</a>
                            </li>
                        </ul>

                        <form class="tab-content page-settings-form" action="#" method="post">
                            {{ csrf_field() }}
                            <div class="tab-pane fade active show" id="generalSettings" style="margin-top: 20px;">
                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="categories">Категория страницы:</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="category_id">
                                            <option>Без категории</option>
                                            @foreach (\App\Models\PageCategory::all() as $category)
                                                <option
                                                        @if ($staticPage->category == $category) selected @endif
                                                        value="{{ $category->id }}"
                                                >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="name">Название страницы:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="name" name="name" value="{{ $staticPage->name ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Адрес страницы:</label>
                                    <div class="input-group col-md-9">
                                        <input name="address" class="form-control" type="text" value="{{ $staticPage->getSlug() ?? '' }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <a href="{{ $staticPage->getShowcaseUrl() }}" target="_blank">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="seo" style="margin-top: 20px;">
                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="metaTitle">Тег TITLE:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="metaTitle" name="tag_title" value="{{ $staticPage->meta_title ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="metaDescription">Метатег DESCRIPTION:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="metaDescription" name="meta_description" value="{{ $staticPage->meta_description ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="metaKeywords">Метатег KEYWORDS:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="metaKeywords" name="meta_keywords" value="{{ $staticPage->meta_keywords ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-default" type="submit" disabled>
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i> Сохранить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="bs-component">
                        <div class="card">
                            <div class="card-body">
                                <label class="control-label">Информация о статье</label>

                                <div style="display: flex;flex-direction: column;padding:15px;">
                                    <div style="display: flex;justify-content: space-between;flex-wrap: wrap;">
                                        <div>
                                            <i class="far fa-check-circle"></i> Опубликовано:
                                        </div>
                                        <div class="toggle-flip" style="height: 21px;">
                                            <label>
                                                <input
                                                        data-href="#"
                                                        @if ($staticPage->enable) checked @endif
                                                        type="checkbox"
                                                        class="checkbox"
                                                ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div style="display: flex;justify-content: space-between;flex-wrap: wrap;padding-top: 15px;">
                                        <div>
                                            <i class="far fa-calendar-check"></i> Создано:
                                        </div>
                                        <div>
                                            {{ $staticPage->created_at ?? '' }}
                                        </div>
                                    </div>
                                    <div style="display: flex;justify-content: space-between;flex-wrap: wrap;padding-top: 15px;">
                                        <div>
                                            <i class="far fa-calendar-plus"></i> Обновлено:
                                        </div>
                                        <div>
                                            {{ $staticPage->updated_at ?? '' }}
                                        </div>
                                    </div>
                                    <div style="display: flex;justify-content: space-between;flex-wrap: wrap;padding-top: 15px;">
                                        <div>
                                            <i class="far fa-plus-square"></i> Обновлен:
                                        </div>
                                        <div>
                                            {{ $staticPage->updater ?? '' }}
                                        </div>
                                    </div>
                                    <div style="display: flex;justify-content: space-between;flex-wrap: wrap;padding-top: 15px;">
                                        <div>
                                            <i class="fas fa-street-view"></i> Просмотрено:
                                        </div>
                                        <div>
                                            {{ $staticPage->view_count ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
