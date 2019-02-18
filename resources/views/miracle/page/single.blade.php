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
            <div class="block">
                {!! $page->content !!}
            </div>
            <div class="soap-gallery small-post">
                <div class="row">
                    <div class="col-sms-6 col-sm-4 col-md-2">
                        <article>
                            <a href="http://placehold.it/400x294" class="image soap-mfp-popup">
                                <img src="http://placehold.it/400x294" alt="">
                                <div class="image-extras"></div>
                            </a>
                            <div class="post-content">
                                <h6 class="post-title"><a href="#">Fullwidth Gallery</a></h6>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-4 col-md-2">
                        <article>
                            <a href="http://placehold.it/400x294" class="image hover-style1 soap-mfp-popup">
                                <img src="http://placehold.it/400x294" alt="">
                                <div class="image-extras"></div>
                            </a>
                            <div class="post-content">
                                <h6 class="post-title"><a href="#">Wide Image Post</a></h6>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-4 col-md-2">
                        <article>
                            <a href="http://placehold.it/400x294" class="image hover-style2 soap-mfp-popup">
                                <img src="http://placehold.it/400x294" alt="">
                                <div class="image-extras"></div>
                            </a>
                            <div class="post-content">
                                <h6 class="post-title"><a href="#">Big Slider Post</a></h6>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-4 col-md-2">
                        <article>
                            <a href="http://placehold.it/400x294" class="image soap-mfp-popup">
                                <img src="http://placehold.it/400x294" alt="">
                                <div class="image-extras"></div>
                            </a>
                            <div class="post-content">
                                <h6 class="post-title"><a href="#">Video Project</a></h6>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-4 col-md-2">
                        <article>
                            <a href="http://placehold.it/400x294" class="image hover-style1 soap-mfp-popup">
                                <img src="http://placehold.it/400x294" alt="">
                                <div class="image-extras"></div>
                            </a>
                            <div class="post-content">
                                <h6 class="post-title"><a href="#">Small Slideshow</a></h6>
                            </div>
                        </article>
                    </div>
                    <div class="col-sms-6 col-sm-4 col-md-2">
                        <article>
                            <a href="http://placehold.it/400x294" class="image hover-style2 soap-mfp-popup">
                                <img src="http://placehold.it/400x294" alt="">
                                <div class="image-extras"></div>
                            </a>
                            <div class="post-content">
                                <h6 class="post-title"><a href="#">2/3 Image List</a></h6>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection