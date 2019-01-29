@extends('miracle.layouts.master')

@section('slider')
    @include('miracle.vendor.sections.slideshow')
@endsection

@section('content')
    @include('miracle.vendor.sections.icon_box')
    @include('miracle.vendor.sections.post_wrapper')
    @include('miracle.vendor.sections.trend')
    @include('miracle.vendor.sections.blog')
    @include('miracle.vendor.sections.colors_section')
    @include('miracle.vendor.sections.callout_box')

    <div class="parallax has-caption parallax-image2" data-stellar-background-ratio="0.5">
        <div class="caption-wrapper">
            <h2 class="caption animated size-lg" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0">Whatever You Do Give Your Best!</h2>
            <br>
            <h3 class="caption animated size-md" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="1">welcome to parallax scrolling</h3>
        </div>
    </div>

    @include('miracle.vendor.sections.multi_box')
    @include('miracle.vendor.sections.responsive')
    @include('miracle.vendor.sections.reviews')
@endsection