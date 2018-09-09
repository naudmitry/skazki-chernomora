@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Главная',
        'description' => 'Добавление и редактирование сведений главной страницы сайта',
        'page' => 'Главная страница'
    ])

    <div class="page-settings">
        @include('admin.main.page_settings')
    </div>

    <script type="text/template" class="page-settings-loading-template">
        @include('admin.main.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>

    <script type="text/javascript">
        let backendPageConfig = {
            saveCategorySequence: '{{ route('admin.blog.category.sequence') }}',
        };
    </script>
@endsection
