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
                        <label class="control-label col-md-3">Имя для списка:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="title" name="title" value="{{ $faq->title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Вопрос:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="name" name="name" value="{{ $faq->name ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Адрес категории:</label>
                        <div class="input-group col-md-9">
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
                        <label class="control-label col-md-3" for="name">Ответ:</label>
                        <div class="col-md-9">
                            <textarea name="answer" rows="4" cols="5" class="form-control" required="required">{{ $faq->answer ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Навигационная цепочка:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="breadcrumbs" name="breadcrumbs" value="{{ $faq->breadcrumbs ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Тег TITLE:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaTitle" name="meta_title" value="{{ $faq->meta_title ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Метатег DESCRIPTION:</label>
                        <div class="col-md-9">
                            <input class="form-control" id="metaDescription" name="meta_description" value="{{ $faq->meta_description ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Метатег KEYWORDS:</label>
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
                                        <i class="far fa-check-circle"></i> Опубликовано:
                                    </div>
                                    <div class="toggle-flip" style="height: 21px;">
                                        <label>
                                            <input
                                                    data-href="{{ isset($faq) ? route('admin.faq.question.enable', $faq) : '' }}"
                                                    @if ($faq->enable) checked @endif
                                                    type="checkbox"
                                                    class="checkbox"
                                            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-calendar-check"></i> Создано:
                                    </div>
                                    <div>
                                        {{ $faq->created_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-calendar-plus"></i> Обновлено:
                                    </div>
                                    <div>
                                        {{ $faq->updated_at->format('d/m/Y H:i') ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="far fa-plus-square"></i> Обновлен:
                                    </div>
                                    <div>
                                        {{ $faq->updater->name ?? '' }} {{ $faq->updater->surname ?? '' }}
                                    </div>
                                </div>
                                <div class="information-row">
                                    <div>
                                        <i class="fas fa-street-view"></i> Просмотрено:
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
                <i class="fa fa-fw fa-lg fa-check-circle"></i> Сохранить
            </button>
        </div>
    </form>
</div>
