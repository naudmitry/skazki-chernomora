<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Medic | Medical HTML Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Slick Carousel -->
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet"/>

    <!-- FancyBox -->
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet"/>

    <!-- Stylesheets -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        {{--<div class="preloader"></div>--}}
        <!-- Preloader -->

        @include('site.layouts.header.social')
        @include('site.layouts.header.contact')
        @include('site.layouts.header.menu')
