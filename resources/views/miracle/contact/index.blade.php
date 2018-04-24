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
    <div class="container">
        @if ($saltCaves)
            <ul class="contact-address style2 col-md-12">
                @foreach($saltCaves as $saltCave)
                    <li class="office-address">
                        <i class="fa fa-map-marker"></i>
                        <div class="details">
                            <h5>{{ $saltCave->title }}</h5>
                            <p>{{ $saltCave->address }}</p>
                            <p>{{ implode(", ", $saltCave->phone_numbers) }}</p>
                            <p>{{ implode(", ", $saltCave->working_time) }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        @foreach(array_get($pageWidgets, 'middle', []) as $widget)
            @widget('miracle.' . $widget->class_name, ['widget' => $widget])
        @endforeach
    </div>
@endsection