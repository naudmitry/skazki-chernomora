@extends('miracle.layouts.master')

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    @foreach(array_get($pageWidgets, 'middle', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach

    {{--@include('miracle.vendor.sections.responsive')--}}
    {{--@include('miracle.vendor.sections.reviews')--}}
@endsection