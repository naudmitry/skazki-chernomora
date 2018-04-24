@extends('miracle.layouts.master')

@section('header__meta')
    <title>{{ $page->meta_title }}</title>
    <meta name="description" content="{{ $page->meta_description }}"/>
    <meta name="keywords" content="{{ $page->meta_keywords }}"/>
@endsection

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    <div class="container">
        <div id="main">
            <h2>{{ $page->name }}</h2>
            @if ($page->content)
                <div class="section-info">
                    {!! $page->content !!}
                </div>
            @endif
            @foreach(array_get($pageWidgets, 'middle', []) as $widget)
                @widget('miracle.' . $widget->class_name, ['widget' => $widget])
            @endforeach
        </div>
    </div>
@endsection