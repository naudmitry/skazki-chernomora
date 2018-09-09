@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Контакты',
        'description' => 'Добавление и редактирование сведений страницы контактов',
        'page' => 'Страница контактов'
    ])

    <div class="page-settings">
        @include('admin.contacts.page_settings')
    </div>

    <script type="text/template" class="page-settings-loading-template">
        @include('admin.contacts.loading')
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
