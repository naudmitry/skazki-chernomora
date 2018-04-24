@extends('medic.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $blog->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $blog->meta_keywords ?? '' }}"/>
    <title>{{ $blog->meta_title ?? 'Новости' }}</title>
@endsection

@section('content')
    @include('medic.vendor.navigation', [
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
                                <span>{{ $blog->updater->full_name }} / {{ $blog->updated_at->format('d-m-Y H:i') }}</span>
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                @include('medic.blog.right_side')
            </div>
        </div>
    </section>
@endsection
