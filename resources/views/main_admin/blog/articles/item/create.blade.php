@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Новости',
        'page' => 'Добавление статьи'
    ])

    <div class="row">
        <div class="col-md-12 blog-item">
            <div class="tile">
                <h4 class="line-head">Добавление статьи</h4>

                <form class="tab-content blog-item-form" action="{{ route('admin.blog.articles.save', '') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="categories">Категории:</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" multiple name="categories[]">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="title">Имя для списка:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="title" name="title">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3" for="name">Название новости:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="name" name="name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Адрес категории:</label>
                                    <div class="input-group col-md-9">
                                        <input id="address" name="address" class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="control-label col-md-4" for="metaTitle">Тег TITLE:</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="metaTitle" name="meta_title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-4" for="metaDescription">Метатег DESCRIPTION:</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="metaDescription" name="meta_description">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-4" for="metaKeywords">Метатег KEYWORDS:</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="metaKeywords" name="meta_keywords">
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
        </div>
    </div>
@endsection