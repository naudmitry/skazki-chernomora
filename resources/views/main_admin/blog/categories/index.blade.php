@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Новости',
        'page' => 'Категории'
    ])

    <div class="page-settings">
        @include('main_admin.page.static.settings')
    </div>

    <div class="row">
        <div class="col-md-6 blog-categories">
            <div class="tile">
                <h3 class="tile-title">Категории новости</h3>

                <div class="blog-categories-list" id="container">
                    @foreach ($categories as $category)
                        @include('main_admin.blog.categories.includes.item')
                    @endforeach
                </div>

                <div class="tile-footer">
                    <button
                        class="btn btn-primary blog-category-settings-open"
                        type="button"
                        href="{{ route('admin.blog.category.create') }}"
                    ><i class="fa fa-fw fa-lg fa-plus-circle" aria-hidden="true"></i>Добавить категорию</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 blog-categories-settings-container"></div>
    </div>

    <script type="text/template" class="blog-category-settings-loading-template">
        @include('main_admin.blog.categories.includes.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript">
        let backendPageConfig = {
            saveCategorySequence: '{{ route('admin.blog.category.sequence') }}',
        };
    </script>
@endsection
