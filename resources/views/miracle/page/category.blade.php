@extends('miracle.layouts.master')

@section('header__meta')
    <title>{{ $category->meta_title }}</title>
    <meta name="description" content="{{ $category->meta_description }}"/>
    <meta name="keywords" content="{{ $category->meta_keywords }}"/>
@endsection

@section('page-title')
    @include('miracle.vendor.page_title', [
        'title' => $category->title,
        'link' => $category->image_link,
        'color' => $category->color
    ])
@endsection

@section('content')
    <div class="container">
        <div id="main">
            <div class="blog-posts row same-height">
                @foreach ($pages as $page)
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="post post-grid">
                            <div class="post-image">
                                <div class="image-container">
                                    <a href="{{ $page->getRoute() }}">
                                        <img class="page-category-item-img" alt="{{ $page->name }}" src="{{ $page->link }}">
                                    </a>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="post-date"><span>{{ strftime('%d %B %G', strtotime($page->created_at)) }}</span></div>
                                <h4 class="entry-title"><a href="{{ $page->getRoute() }}">{{ mb_strimwidth($page->title, 0, 25, "...") }}</a></h4>
                                <div class="post-meta">
                                    <span class="entry-author fn"><a href="#">{{ $page->author->full_name }}</a></span>
{{--                                    <span class="post-category">in <a href="#">Web Design</a></span>--}}
{{--                                    <span class="post-comment"><a href="#">1 Comment</a></span>--}}
                                </div>
                                <p>{{ mb_strimwidth(strip_tags($page->content), 0, 60, "...") }}</p>
                                <div class="post-action">
                                    <a class="btn btn-sm style3 post-read-more" href="{{ $page->getRoute() }}">Подробнее</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            {{ $pages->links('miracle.vendor.pagination') }}
        </div>
    </div>
@endsection