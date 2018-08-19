@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'FAQ',
        'description' => 'Добавление и редактирование вопросов',
        'page' => 'Вопросы'
    ])

    <div class="row">
        <div class="col-md-12 faq-questions">
            <div class="tile">
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-4 align-self-end">
                            <button data-href="{{ route('admin.faq.question.create') }}" class="btn btn-primary open-create-form" type="button">
                                <i class="fas fa-plus-circle"></i> Добавить
                            </button>
                        </div>
                    </div>
                </div>

                <div class="tile-body">
                    <table
                            class="table table-hover table-bordered" style="width: 100%"
                            id="faqQuestionsTable"
                            data-href="{{ route('admin.faq.question.index') }}"
                    >
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Наименование</th>
                            <th>Категории</th>
                            <th>Опубликован</th>
                            <th>Автор</th>
                            <th>Обновлено</th>
                            <th>Редактор</th>
                            <th>Просмотрено</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-created">
        @include('admin.faq.questions.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-title">
        @include('admin.faq.questions.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-categories">
        @include('admin.faq.questions.columns.categories')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-published">
        @include('admin.faq.questions.columns.published')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-author">
        @include('admin.faq.questions.columns.author')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-updated">
        @include('admin.faq.questions.columns.updated')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-updater">
        @include('admin.faq.questions.columns.updater')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-viewed">
        @include('admin.faq.questions.columns.viewed')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-actions">
        @include('admin.faq.questions.columns.actions')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mustache.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection
