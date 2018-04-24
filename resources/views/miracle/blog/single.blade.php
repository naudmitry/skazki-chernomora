@extends('miracle.layouts.master')

@section('header__meta')
    <title>{{ $blog->meta_title }}</title>
    <meta name="description" content="{{ $blog->meta_description }}"/>
    <meta name="keywords" content="{{ $blog->meta_keywords }}"/>
@endsection

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    <div class="container single-post">
        <div id="main">
            <article class="post box-lg">
                <div class="post-date">
                    <span class="day">{{ $blog->created_at->format('d') }}</span>
                    <span class="month">{{ strftime('%B', strtotime($blog->created_at)) }}</span>
                </div>
                <div class="post-image">
                    <div class="image-container">
                        <a href="{{ $blog->getRoute() }}"><img alt="{{ $blog->title }}" src="{{ $blog->link }}"></a>
                    </div>
                </div>
                <div class="post-content">
                    <h2 class="entry-title"><a href="{{ $blog->getRoute() }}">{{ $blog->name }}</a></h2>
                    @if ($blog->content)
                        <div class="section-info">
                            {!! $blog->content !!}
                        </div>
                    @endif
                    @foreach(array_get($pageWidgets, 'middle', []) as $widget)
                        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
                    @endforeach
                </div>
            </article>
        </div>
    </div>
@endsection