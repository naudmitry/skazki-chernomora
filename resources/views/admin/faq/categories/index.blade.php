@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Вопросы',
        'description' => 'Добавление и редактирование сведений категорий вопросов',
        'page' => 'Категории'
    ])

    <div class="row">
        <div class="col-md-6 faq-categories">
            <div class="tile">
                <h3 class="tile-title">Категории вопроса</h3>

                <div class="faq-categories-list" id="container">
                    @foreach ($categories as $category)
                        @include('admin.faq.categories.includes.item')
                    @endforeach
                </div>

                <div class="tile-footer">
                    <button
                        class="btn btn-primary faq-category-settings-open"
                        type="button"
                        href="{{ route('admin.faq.category.create') }}"
                    ><i class="fa fa-fw fa-lg fa-plus-circle" aria-hidden="true"></i>Добавить категорию</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 faq-category-settings-container"></div>
    </div>

    <script type="text/template" class="faq-category-settings-loading-template">
        @include('admin.faq.categories.includes.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>

    <script type="text/javascript">
        let backendPageConfig = {
            saveCategorySequence: '{{ route('admin.faq.category.sequence') }}',
        };
    </script>
@endsection
