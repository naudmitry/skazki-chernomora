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
                @foreach ($entities as $entity)
                    <div class="col-sms-6 col-sm-6 col-md-3">
                        <article class="post post-grid">
                            <div class="post-image">
                                <div class="image-container">
                                    <a href="{{ $entity->getRoute() }}">
                                        <img class="page-category-item-img" alt="{{ $entity->title }}" src="{{ $entity->link }}">
                                    </a>
                                </div>
                            </div>
                            <div class="post-content">
                                <div class="post-date"><span>{{ strftime('%d %B %G', strtotime($entity->created_at)) }}</span></div>
                                <h4 class="entry-title"><a href="{{ $entity->getRoute() }}">{{ $entity->trim($entity->name, 25) }}</a></h4>
                                <div class="post-meta">
{{--                                    <span class="post-category">in <a href="#">Web Design</a></span>--}}
{{--                                    <span class="post-comment"><a href="#">1 Comment</a></span>--}}
                                </div>
                                <p>{{ $entity->trim($entity->content, 55) }}</p>
                                <div class="post-action">
                                    <a class="btn btn-sm style3 post-read-more" href="{{ $entity->getRoute() }}">Подробнее</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            {{ $entities->links('miracle.vendor.pagination') }}
        </div>
    </div>
@endsection