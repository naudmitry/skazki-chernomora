@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Новости',
        'description' => 'Добавление и редактирование статьи',
        'page' => 'Статья в новостях'
    ])

    <div class="row">
        <div class="col-md-12 blog-article">
            <div class="tile">
                <div class="page-header">
                    <h2 class="mb-3 line-head">Настройка статьи</h2>
                </div>

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
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="generalSettings" style="margin-top: 20px;">

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="categories">Категории:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="categoties">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="title">Имя для списка:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="title" value="{{ $blog->title_list ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="name">Название новости:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="name" value="{{ $blog->title ?? '' }}">
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="seo" style="margin-top: 20px;">
                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="metaTitle">Метатег TITLE:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="metaTitle" value="{{ $blog->meta_title ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="metaDescription">Метатег DESCRIPTION:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="metaDescription" value="{{ $blog->meta_description ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="metaKeywords">Метатег KEYWORDS:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="metaKeywords" value="{{ $blog->meta_keywords ?? '' }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
