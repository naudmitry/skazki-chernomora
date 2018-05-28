@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Новости',
        'description' => 'Добавление и редактирование сведений категорий новостей',
        'page' => 'Категории'
    ])

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Категории новости</h3>
                @include('admin.blog.categories.includes.item')

                <div class="tile-footer">
                    <button class="btn btn-primary" type="button">
                        <i class="fa fa-fw fa-lg fa-plus-circle" aria-hidden="true"></i>Добавить категорию
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            @include('admin.blog.categories.includes.settings')
        </div>
    </div>
@endsection