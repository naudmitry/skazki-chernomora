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
        <div id="main">
            <div class="panel-group faqs" id="faqs">
                @foreach ($faqs as $faq)
                    <div class="panel">
                        <h3 class="panel-title">
                            <a class="collapsed" data-parent="#faqs" data-toggle="collapse" href="#faqs-{{ $loop->index }}"><span class="open-sub"></span>{{ $faq->name }}</a>
                        </h3>
                        <div class="panel-collapse collapse" id="faqs-{{ $loop->index }}">
                            <div class="panel-content">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection