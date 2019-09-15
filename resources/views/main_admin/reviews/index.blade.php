@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Пользователи',
        'page' => 'Отзывы'
    ])

    <div class="row">
        <div class="col-md-12 reviews">
            <div class="tile">
                <div class="tile-body mb-4">
                    <div class="row">
                        <div class="col-md-6 col-lg-2">
                            <button href="{{ route('admin.review.modal') }}" class="btn btn-primary open-review-modal" type="button">
                                <i class="fas fa-plus-circle mr-2"></i>Добавить
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-user-minus"></i>
                                </div>
                                <div class="info">
                                    <p class="negative-count">0</p>
                                    <p>негативных</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="info">
                                    <p class="positive-count">0</p>
                                    <p>позитивных</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                <div class="info">
                                    <p class="average-rating">0</p>
                                    <p>среднее</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-2">
                            <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                        </div>
                    </div>
                </div>

                <div class="tile-body datatable-scroll-lg">
                    <table class="table table-hover" id="reviewsTable" data-href="{{ route('admin.reviews.index') }}" width="100%">
                        <thead>
                        <tr>
                            <th>Дата/IP</th>
                            <th>Статус</th>
                            <th>Клиент</th>
                            <th>Рейтинг</th>
                            <th>Отзыв</th>
                            <th>Избранное</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="div-for-modal"></div>

    <script type="application/x-tmpl-mustache" class="template-reviews-table-column-actions">
        @include('main_admin.reviews.columns.actions')
    </script>
    <script type="application/x-tmpl-mustache" class="template-reviews-table-column-created">
        @include('main_admin.reviews.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-reviews-table-column-rating">
        @include('main_admin.reviews.columns.rating')
    </script>
    <script type="application/x-tmpl-mustache" class="template-reviews-table-column-review">
        @include('main_admin.reviews.columns.review')
    </script>
    <script type="application/x-tmpl-mustache" class="template-reviews-table-column-show">
        @include('main_admin.reviews.columns.show')
    </script>
    <script type="application/x-tmpl-mustache" class="template-reviews-table-column-status">
        @include('main_admin.reviews.columns.status')
    </script>
    <script type="application/x-tmpl-mustache" class="template-reviews-table-column-user">
        @include('main_admin.reviews.columns.user')
    </script>
@endsection