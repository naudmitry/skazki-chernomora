@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'FAQ',
        'page' => 'Категории'
    ])

    <div class="page-settings">
        @include('main_admin.page.static.settings')
    </div>

    <div class="row">
        <div class="col-md-6 faq-categories">
            <div class="tile">
                <h4 class="line-head">Категории</h4>

                <div class="faq-categories-list" id="container">
                    @foreach ($categories as $category)
                        @include('main_admin.faq.categories.includes.item')
                    @endforeach
                </div>

                <div class="tile-footer">
                    <button
                        class="btn btn-primary faq-category-settings-open"
                        type="button"
                        href="{{ route('admin.faq.category.create') }}"
                    ><i class="fa fa-fw fa-lg fa-plus-circle" aria-hidden="true"></i>Добавить</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 faq-categories-settings-container"></div>
    </div>

    <script type="text/template" class="faq-category-settings-loading-template">
        @include('main_admin.faq.categories.includes.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript">
        let backendPageConfig = {
            saveCategorySequence: '{{ route('admin.faq.category.sequence') }}',
        };
    </script>
@endsection
