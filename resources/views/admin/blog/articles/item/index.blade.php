@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Новости',
        'description' => 'Добавление и редактирование статьи',
        'page' => 'Статья в новостях'
    ])

    <div class="row">
        <div class="col-md-12 blog-item">
            <div class="tile">
                <div     class="page-header">
                    <h2 class="mb-3 line-head">Настройка статьи</h2>
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

                            <form
                                    class="tab-content blog-item-form"
                                    action="{{ route('admin.blog.article.save', $blog ?? '') }}"
                                    method="post"
                            >
                                <div class="tab-pane fade active show" id="generalSettings" style="margin-top: 20px;">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3" for="categories">Категории:</label>
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
                                        <label class="control-label col-md-3" for="title">Имя для списка:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="title" name="title" value="{{ $blog->title ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3" for="name">Название новости:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="name" name="name" value="{{ $blog->name ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">Адрес категории:</label>
                                        <div class="input-group col-md-9">
                                            <input name="address" class="form-control" type="text" value="{{ $blog->getSlug() }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <a href="{{ $blog->getShowcaseUrl() }}" target="_blank">
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
                                            <input class="form-control" id="metaTitle" name="meta_title" value="{{ $blog->meta_title ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3" for="metaDescription">Метатег DESCRIPTION:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="metaDescription" name="meta_description" value="{{ $blog->meta_description ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3" for="metaKeywords">Метатег KEYWORDS:</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="metaKeywords" name="meta_keywords" value="{{ $blog->meta_keywords ?? '' }}">
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
                                                            data-href="{{ isset($blog) ? route('admin.blog.article.enable', $blog) : '' }}"
                                                            @if ($blog->enable) checked @endif
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
                                                {{ $blog->created_at->format('d/m/Y') ?? '' }}
                                            </div>
                                        </div>
                                        <div style="display: flex;justify-content: space-between;flex-wrap: wrap;padding-top: 15px;">
                                            <div>
                                                <i class="far fa-calendar-plus"></i> Обновлено:
                                            </div>
                                            <div>
                                                {{ $blog->updated_at->format('d/m/Y') ?? '' }}
                                            </div>
                                        </div>
                                        <div style="display: flex;justify-content: space-between;flex-wrap: wrap;padding-top: 15px;">
                                            <div>
                                                <i class="far fa-plus-square"></i> Обновлен:
                                            </div>
                                            <div>
                                                {{ $blog->updater->name ?? '' }}
                                            </div>
                                        </div>
                                        <div style="display: flex;justify-content: space-between;flex-wrap: wrap;padding-top: 15px;">
                                            <div>
                                                <i class="fas fa-street-view"></i> Просмотрено:
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
            </div>
        </div>
    </div>

    @include('admin.blog.articles.item.editor')
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
