@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Страницы',
        'page' => 'Категории'
    ])

    <div class="row">
        <div class="col-md-6 page-categories">
            <div class="tile">
                <h3 class="tile-title">Категории страницы</h3>

                <div class="page-categories-list" id="container">
                    @foreach ($categories as $category)
                        @include('main_admin.page.categories.includes.item')
                    @endforeach
                </div>

                <div class="tile-footer">
                    <button
                        class="btn btn-primary page-category-settings-open"
                        type="button"
                        href="{{ route('admin.page.category.create') }}"
                    ><i class="fa fa-fw fa-lg fa-plus-circle" aria-hidden="true"></i>Добавить категорию</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 page-categories-settings-container"></div>
    </div>

    <script type="text/template" class="page-category-settings-loading-template">
        @include('main_admin.page.categories.includes.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript">
        let backendPageConfig = {
            saveCategorySequence: '{{ route('admin.page.category.sequence') }}',
        };
    </script>
@endsection
