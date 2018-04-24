@extends('medic.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $staticPage->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $staticPage->meta_keywords ?? '' }}"/>
    <title>{{ $staticPage->meta_title ?: 'Новости' }} {{ ($blogs->currentPage() > 1) ? 'Страница' . $blogs->currentPage() : ''  }}</title>

    <link rel="page" data="{{ $blogs->currentPage() }}">

    @if ($blogs->hasPages())
        @if (!$blogs->onFirstPage())
            <link rel="prev" href="{{ $blogs->previousPageUrl() }}">
        @endif
        @if ($blogs->hasMorePages())
            <link rel="next" href="{{ $blogs->nextPageUrl() }}">
        @endif
    @endif
@endsection

@section('content')
    @include('medic.vendor.navigation', [
        'page' => $staticPage->breadcrumbs ?? 'Новости',
    ])

    <section class="blog-section style-four section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        @foreach ($blogs as $blog)
                            <div class="item-holder">
                                <div class="image-box">
                                    <figure>
                                        <a href="{{ $blog->getShowcaseUrl() }}">
                                            <img src="{{ $blog->link }}" alt="{{ $blog->name }}">
                                        </a>
                                    </figure>
                                </div>
                                <div class="content-text">
                                    <a href="{{ $blog->getShowcaseUrl() }}">
                                        <h6>{{ $blog->name }}</h6>
                                    </a>
                                    <span>{{ $blog->updater->full_name }} / {{ $blog->updated_at->format('d-m-Y H:i') }}</span>
                                    {!! mb_strimwidth($blog->content, 0, 300, "...") !!}
                                    <div class="link-btn">
                                        <a href="{{ $blog->getShowcaseUrl() }}" class="btn-style-one">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @include('medic.blog.right_side')
                </div>
            </div>

            <div class="styled-pagination">
                {{ $blogs->links('medic.vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
