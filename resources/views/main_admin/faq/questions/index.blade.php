@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'FAQ',
        'page' => 'Вопросы'
    ])

    <div class="row">
        <div class="col-md-12 faq-questions">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <button data-href="{{ route('admin.faq.questions.create') }}" class="btn btn-primary open-create-form" type="button">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="enable-faqs-count"><b>{{ array_get($counters, 'enable_faqs_count', 0) }}</b></p>
                                    <p>вопросов онлайн</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="info">
                                    <p class="view-count-total"><b>{{ array_get($counters, 'view_count_total', 0) }}</b></p>
                                    <p>всего просмотров</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mt-2">
                            <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                        </div>
                    </div>
                </div>

                <div class="tile-body datatable-scroll-lg">
                    <table
                            class="table table-hover" style="width: 100%"
                            id="faqQuestionsTable"
                            data-href="{{ route('admin.faq.questions.index') }}"
                    >
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Наименование</th>
                            <th>Категории</th>
                            <th>Опубликован</th>
                            <th>Избранное</th>
                            <th>Обновлено</th>
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
        @include('main_admin.faq.questions.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-title">
        @include('main_admin.faq.questions.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-categories">
        @include('main_admin.faq.questions.columns.categories')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-published">
        @include('main_admin.faq.questions.columns.published')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-favorite">
        @include('main_admin.faq.questions.columns.favorite')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-updated">
        @include('main_admin.faq.questions.columns.updated')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-viewed">
        @include('main_admin.faq.questions.columns.viewed')
    </script>
    <script type="application/x-tmpl-mustache" class="template-faq-questions-table-column-actions">
        @include('main_admin.faq.questions.columns.actions')
    </script>
@endsection