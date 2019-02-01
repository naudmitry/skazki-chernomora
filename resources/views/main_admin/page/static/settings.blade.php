<div class="tile">
    <h4 class="line-head">Настройки страницы</h4>

    <form class="tab-content page-settings-form" action="{{ route('admin.static.page.save', $staticPage) }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="bs-component">
                    <div class="form-group row">
                        <label class="control-label col-md-3" for="name">Название страницы:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="name" name="name" value="{{ $staticPage->name ?? '' }}">
                        </div>
                    </div>

                    @if ($staticPage->static_page_type != \App\Classes\StaticPageTypesEnum::MAIN_PAGE)
                        <div class="form-group row">
                            <label class="control-label col-md-3">Адрес страницы:</label>
                            <div class="input-group col-md-9">
                                <input id="address" name="address" class="form-control" type="text" value="{{ $staticPage->getSlug() ?? '' }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a href="{{ $staticPage->getShowcaseUrl($administeredShowcase) }}" target="_blank">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="control-label col-md-3">Навигационная цепочка:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="breadcrumbs" name="breadcrumbs" value="{{ $staticPage->breadcrumbs ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="metaTitle">Тег TITLE:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaTitle" name="meta_title" value="{{ $staticPage->meta_title ?? '' }}">
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
            </div>

            <div class="col-md-4">
                <div class="bs-component">
                    <div class="card">
                        <div class="card-body">
                            <label class="control-label">Информация о странице</label>
                            <div class="information-container">
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-calendar-plus"></i> Обновлено:
                                    </div>
                                    <div>
                                        {{ $staticPage->updated_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-plus-square"></i> Обновлен:
                                    </div>
                                    <div>
                                        {{ $staticPage->updater->full_name }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="fas fa-street-view"></i> Просмотрено:
                                    </div>
                                    <div>
                                        {{ $staticPage->view_count ?? 0 }}
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
