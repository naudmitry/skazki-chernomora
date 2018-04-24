@extends('miracle.layouts.master')

@section('header__meta')
    <title>{{ $staticPage->meta_title }} {{ ($blogs->currentPage() > 1) ? 'Страница' . $blogs->currentPage() : ''  }}</title>
    <meta name="description" content="{{ $staticPage->meta_description }}"/>
    <meta name="keywords" content="{{ $staticPage->meta_keywords }}"/>

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

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    <div class="container">
        <div id="main">
            <div class="blog-posts layout-timeline layout-fullwidth">
                <div class="timeline-author">
                    <img src="{{ asset('miracle/images/logo-standard.svg') }}" alt="logo" style="margin-top: 10px;">
                </div>
                <div class="iso-container iso-col-2 style-masonry has-column-width">
                    @foreach ($blogs as $index => $blog)
                        <div class="iso-item">
                            <article class="post post-masonry">
                                @if ($loop->first || ($blog->created_at->diffInDays($blogs[$index - 1]->created_at) > 0))
                                    <div class="post-date">{{ strftime('%d %B %G', strtotime($blog->created_at)) }}</div>
                                @endif
                                <div class="post-image">
                                    <div class="image">
                                        <img src="{{ $blog->link }}" alt="{{ $blog->title }}">
                                        <div class="image-extras">
                                            <a href="{{ $blog->getRoute() }}" class="post-gallery"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-content no-author-img">
                                    <div class="post-meta">
                                        <span class="entry-time"><span class="published">{{ $blog->getFormatCreatedAtAttribute() }}</span></span>
                                    </div>
                                    <h3 class="entry-title"><a href="{{ $blog->getRoute() }}">{{ $blog->name }}</a></h3>
                                    <p>{{ $blog->trim($blog->content, 200) }}</p>
                                </div>
                                <div class="post-action">
                                    <a href="{{ $blog->getRoute() }}" class="btn btn-sm style3 post-read-more">Подробнее</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                @if ($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}" class="load-more">
                        <i class="fa fa-angle-double-down"></i>
                    </a>
                @endif
            </div>

            {{ $blogs->links('miracle.vendor.pagination') }}
        </div>
    </div>
@endsection