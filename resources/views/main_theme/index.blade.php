@extends('main_theme.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $staticPage->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $staticPage->meta_keywords ?? '' }}"/>
    <title>{{ $staticPage->meta_title ?: 'Главная' }}</title>
@endsection

@section('content')
    @include('main_theme.vendor.sections.slider')
    @include('main_theme.vendor.sections.visit')
    @include('main_theme.vendor.sections.about')
    @include('main_theme.vendor.sections.service')
    @include('main_theme.vendor.sections.review')
@endsection
