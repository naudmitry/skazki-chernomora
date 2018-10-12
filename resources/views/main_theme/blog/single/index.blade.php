@extends('main_theme.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $blog->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $blog->meta_keywords ?? '' }}"/>
    <title>{{ $blog->meta_title ?? 'Новости' }}</title>
@endsection

@section('content')
    @include('main_theme.vendor.pageHeader', [
        'page' => 'Информация о новости',
    ])

    <section class="blog-section section style-four style-five">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        <div class="item-holder">
                            <div class="image-box">
                                <figure>
                                    <a href="javascript:;">
                                        <img src="{{ $blog->link }}" alt="">
                                    </a>
                                </figure>
                            </div>
                            <div class="content-text">
                                <a href="javascript:;">
                                    <h5>{{ $blog->name }}</h5>
                                </a>
                                <span>{{ $blog->author->surname }} {{ $blog->author->name }} / {{ $blog->updated_at }}</span>
                                <p>{{ $blog->content }}</p>
                            </div>
                        </div>
                    </div>

                    @include('main_theme.blog.comments.index')
                </div>

                @include('main_theme.blog.right_side')
            </div>
        </div>
    </section>
@endsection
