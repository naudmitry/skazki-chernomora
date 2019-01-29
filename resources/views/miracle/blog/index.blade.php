@extends('miracle.layouts.master')

@section('slider')
    @include('miracle.vendor.breadcrumbs')
@endsection

@section('content')
    <div class="container">
        <div id="main">
            <div class="blog-posts layout-timeline layout-fullwidth">
                <div class="timeline-author">
                    <img src="http://placehold.it/100x100" alt="">
                </div>
                <div class="iso-container iso-col-2 style-masonry has-column-width">
                    @foreach ($blogs as $blog)
                        <div class="iso-item">
                            <article class="post post-masonry">
                                <div class="post-date">{{ $blog->created_at->format('d M, Y') }}</div>
                                <div class="post-image">
                                    <div class="image">
                                        <img src="{{ $blog->link }}" alt="{{ $blog->title }}">
                                        <div class="image-extras">
                                            <a href="#" class="post-gallery"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-content no-author-img">
                                    <div class="post-meta">
                                        <span class="entry-author fn"><a href="#">{{ $blog->author->full_name }}</a></span>
                                        <span class="entry-time"><span class="published">{{ $blog->created_at->format('d M, Y') }}</span></span>
                                        <span class="post-category">in <a href="#">Web Design</a></span>
                                    </div>
                                    <h3 class="entry-title"><a href="#">{{ $blog->name }}</a></h3>
                                    <p>{!! $blog->content !!}</p>
                                </div>
                                <div class="post-action">
                                    <a href="#" class="btn btn-sm style3 post-comment"><i class="fa fa-comment"></i>25</a>
                                    <a href="#" class="btn btn-sm style3 post-like"><i class="fa fa-heart"></i>480</a>
                                    <a href="#" class="btn btn-sm style3 post-share"><i class="fa fa-share"></i>Share</a>
                                    <a href="#" class="btn btn-sm style3 post-read-more">Подробнее</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <a href="#" class="load-more"><i class="fa fa-angle-double-down"></i></a>
            </div>
        </div>
    </div>
@endsection