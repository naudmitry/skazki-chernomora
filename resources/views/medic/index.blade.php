@extends('medic.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $staticPage->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $staticPage->meta_keywords ?? '' }}"/>
    <title>{{ $staticPage->meta_title ?: 'Главная' }}</title>
@endsection

@section('content')
    @include('medic.vendor.sections.slider')
    @include('medic.vendor.sections.visit')
    @include('medic.vendor.sections.about')
    @include('medic.vendor.sections.service')
    @include('medic.vendor.sections.review')
@endsection
