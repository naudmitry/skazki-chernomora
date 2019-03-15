@extends('miracle.layouts.master')

@section('header__meta')
    <title>{{ $staticPage->meta_title }}</title>
    <meta name="description" content="{{ $staticPage->meta_description }}"/>
    <meta name="keywords" content="{{ $staticPage->meta_keywords }}"/>
@endsection

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    @foreach(array_get($pageWidgets, 'middle', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection