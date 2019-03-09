@extends('miracle.layouts.master')

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    <div class="container">
        <div id="main">
            <h2>{{ $page->name }}</h2>
            <div class="section-info">
                {!! $page->content !!}
            </div>
            @foreach(array_get($pageWidgets, 'middle', []) as $widget)
                @widget('miracle.' . $widget->class_name, ['widget' => $widget])
            @endforeach
        </div>
    </div>
@endsection