@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Новости',
        'page' => 'Категории'
    ])

    <div class="row">
        <div class="col-lg-5 col-md-12 blog-categories">
            <div class="tile">
                <h4 class="line-head">Категории</h4>

                <div class="blog-categories-list" data-color="#FAEBD7" id="container">
                    @foreach ($categories as $category)
                        @include('main_admin.blog.categories.includes.item')
                    @endforeach
                </div>

                <div class="tile-footer">
                    <button
                        class="btn btn-primary blog-category-settings-open"
                        type="button"
                        href="{{ route('admin.blog.categories.create') }}"
                    ><i class="fas fa-plus-circle mr-2" aria-hidden="true"></i>Добавить</button>
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12 blog-categories-settings-container"></div>
    </div>

    <script type="text/template" class="blog-category-settings-loading-template">
        @include('main_admin.blog.categories.includes.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript">
        let backendPageConfig = {
            saveCategorySequence: '{{ route('admin.blog.categories.sequence') }}',
        };
    </script>
@endsection
