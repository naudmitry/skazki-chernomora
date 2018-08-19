@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Вопросы',
        'description' => 'Добавление и редактирование вопроса',
        'page' => 'Вопрос и ответ'
    ])

    <div class="row">
        <div class="col-md-12 faq-item">
            @include('admin.faq.questions.item.settings')
        </div>
    </div>

    <script type="text/template" class="faq-item-settings-loading-template">
        @include('admin.faq.questions.item.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
