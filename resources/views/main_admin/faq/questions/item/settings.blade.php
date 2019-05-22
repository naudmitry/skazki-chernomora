<div class="tile">
    <h4 class="line-head">Настройка вопроса</h4>

    <form class="tab-content faq-item-form" action="{{ route('admin.faq.question.save', $faq ?? '') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="bs-component">
                    <div class="form-group row">
                        <label class="control-label col-md-3" for="categories">Категории:</label>
                        <div class="col-md-9">
                            <select class="form-control select2" multiple name="categories[]">
                                @foreach ($categories as $category)
                                    <option
                                            @if ($faq->categories->whereIn('id', $category->id)->count()) selected @endif
                                            value="{{ $category->id }}"
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="title">Имя для списка:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="title" name="title" value="{{ $faq->title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="name">Вопрос:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="name" name="name" value="{{ $faq->name ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="address">Адрес вопроса:</label>
                        <div class="input-group col-md-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ $administeredShowcase->getDomainPath() }}</span>
                            </div>
                            <input id="address" name="address" class="form-control" type="text" value="{{ $faq->getSlug() }}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="{{ $faq->getShowcaseUrl($administeredShowcase) }}" target="_blank">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="answer">Ответ:</label>
                        <div class="col-md-9">
                            <textarea name="answer" rows="4" cols="5" class="form-control" required="required">{{ $faq->content ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="breadcrumbs">Навигационная цепочка:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="breadcrumbs" name="breadcrumbs" value="{{ $faq->breadcrumbs ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="metaTitle">Тег TITLE:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaTitle" name="meta_title" value="{{ $faq->meta_title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="metaDescription">Метатег DESCRIPTION:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaDescription" name="meta_description" value="{{ $faq->meta_description ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" for="metaKeywords">Метатег KEYWORDS:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaKeywords" name="meta_keywords" value="{{ $faq->meta_keywords ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bs-component">
                    <div class="card">
                        <div class="card-body">
                            <label class="control-label">Информация о вопросе</label>
                            <div class="information-container">
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-check-circle mr-2"></i>Опубликовано:
                                    </div>
                                    <div class="toggle-flip">
                                        <label class="mb-0">
                                            <input
                                                    data-href="{{ isset($faq) ? route('admin.faq.question.enable', $faq) : '' }}"
                                                    @if ($faq->enable) checked @endif
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
                                                    data-href="{{ isset($faq) ? route('admin.faq.question.favorite', $faq) : '' }}"
                                                    @if ($faq->favorite) checked @endif
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
                                        {{ $faq->created_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-calendar-plus mr-2"></i>Обновлено:
                                    </div>
                                    <div>
                                        {{ $faq->updated_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-plus-square mr-2"></i>Обновлен:
                                    </div>
                                    <div>
                                        {{ $faq->updater->full_name ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="fas fa-street-view mr-2"></i>Просмотрено:
                                    </div>
                                    <div>
                                        {{ $faq->view_count ?? '' }}
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
                <i class="fa fa-check-circle mr-2"></i>Сохранить
            </button>
        </div>
    </form>
</div>
