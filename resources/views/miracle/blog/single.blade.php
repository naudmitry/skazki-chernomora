@extends('miracle.layouts.master')

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    <div class="container single-post">
        <div id="main">
            <article class="post box-lg">
                <div class="post-date">
                    <span class="day">{{ $blog->created_at->format('d') }}</span>
                    <span class="month">{{ $blog->created_at->format('M') }}</span>
                </div>
                <div class="post-image">
                    <div class="image-container">
                        <a href="#"><img alt="" src="{{ $blog->link }}"></a>
                    </div>
                </div>
                <div class="post-content">
                    <div class="post-action">
                        <a href="#" class="btn btn-sm"><i class="fa fa-heart"></i>480</a>
                        <a href="#" class="btn btn-sm"><i class="fa fa-share"></i>Share</a>
                    </div>
                    <h2 class="entry-title"><a href="#">{{ $blog->name }}</a></h2>
                    <div class="post-meta">
                        <span class="post-category"><a href="#">Web Design</a></span>
                        <span class="post-comment"><a href="#">1 Comment</a></span>
                    </div>
                    {!! $blog->content !!}
                    {{--<div class="tags">--}}
                        {{--<a href="#" class="tag">Masonry</a>--}}
                        {{--<a href="#" class="tag">Responsive</a>--}}
                        {{--<a href="#" class="tag">Retina</a>--}}
                    {{--</div>--}}
                </div>
                {{--<div class="about-author box">--}}
                    {{--<div class="author-img">--}}
                        {{--<span><img src="images/post/author/large1.jpg" alt=""></span>--}}
                    {{--</div>--}}
                    {{--<div class="about-author-content">--}}
                        {{--<div class="social-icons">--}}
                            {{--<a href="#" class="social-icon"><i class="fa fa-twitter has-circle"></i></a>--}}
                            {{--<a href="#" class="social-icon"><i class="fa fa-facebook has-circle"></i></a>--}}
                            {{--<a href="#" class="social-icon"><i class="fa fa-google-plus has-circle"></i></a>--}}
                            {{--<a href="#" class="social-icon"><i class="fa fa-skype has-circle"></i></a>--}}
                            {{--<a href="#" class="social-icon"><i class="fa fa-tumblr has-circle"></i></a>--}}
                        {{--</div>--}}
                        {{--<h4>About Author</h4>--}}
                        {{--<p>Nulla mattis rsitmet dolor sollicitudi aliquamquae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo Lorem ipsum dolor sit amet gravida sagittis lacus. Morbi sit amet mauris mi. Quisque laoreet nunc ullamcorper lacus congue elementum. Proin vel sem ipsum consectetur facilisis sit amet nec dui. Pellentesque congue nunc in facilisis vestibulum.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<h3 class="font-normal">Related Posts</h3>--}}
                {{--<div class="related-posts clearfix box-sm same-height">--}}
                    {{--<div class="related-post col-sm-6 col-md-4" style="height: 94px;">--}}
                        {{--<article class="post">--}}
                            {{--<div class="post-image">--}}
                                {{--<div class="img">--}}
                                    {{--<img src="images/post/main/thumbnail/small/26.jpg" alt="">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<h5 class="post-title"><a href="#">Libero molestienulla lorem ipsum</a></h5>--}}
                                {{--<div class="post-meta">--}}
                                    {{--<span>by <a href="#">Admin</a></span>--}}
                                    {{--<span>12 Nov, 2013</span>--}}
                                    {{--<span>in <a href="#">Web Design</a></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</div>--}}
                    {{--<div class="related-post col-sm-6 col-md-4" style="height: 94px;">--}}
                        {{--<article class="post">--}}
                            {{--<div class="post-image">--}}
                                {{--<div class="img">--}}
                                    {{--<img src="images/post/main/thumbnail/small/4.jpg" alt="">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<h5 class="post-title"><a href="#">Sed faucibus tristique placerat</a></h5>--}}
                                {{--<div class="post-meta">--}}
                                    {{--<span>by <a href="#">Admin</a></span>--}}
                                    {{--<span>12 Nov, 2013</span>--}}
                                    {{--<span>in <a href="#">Web Design</a></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</div>--}}
                    {{--<div class="related-post col-sm-6 col-md-4" style="height: 94px;">--}}
                        {{--<article class="post">--}}
                            {{--<div class="post-image">--}}
                                {{--<div class="img">--}}
                                    {{--<img src="images/post/main/thumbnail/small/1.jpg" alt="">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<h5 class="post-title"><a href="#">Enean tempor tincidunt od</a></h5>--}}
                                {{--<div class="post-meta">--}}
                                    {{--<span>by <a href="#">Admin</a></span>--}}
                                    {{--<span>12 Nov, 2013</span>--}}
                                    {{--<span>in <a href="#">Web Design</a></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</div>--}}
                    {{--<div class="related-post col-sm-6 col-md-4" style="height: 94px;">--}}
                        {{--<article class="post">--}}
                            {{--<div class="post-image">--}}
                                {{--<div class="img">--}}
                                    {{--<img src="images/post/main/thumbnail/small/15.jpg" alt="">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<h5 class="post-title"><a href="#">Quis aliquet to metus glavrida</a></h5>--}}
                                {{--<div class="post-meta">--}}
                                    {{--<span>by <a href="#">Admin</a></span>--}}
                                    {{--<span>12 Nov, 2013</span>--}}
                                    {{--<span>in <a href="#">Web Design</a></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</div>--}}
                    {{--<div class="related-post col-sm-6 col-md-4" style="height: 94px;">--}}
                        {{--<article class="post">--}}
                            {{--<div class="post-image">--}}
                                {{--<div class="img">--}}
                                    {{--<img src="images/post/main/thumbnail/small/14.jpg" alt="">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<h5 class="post-title"><a href="#">Diam tempus scelerisque</a></h5>--}}
                                {{--<div class="post-meta">--}}
                                    {{--<span>by <a href="#">Admin</a></span>--}}
                                    {{--<span>12 Nov, 2013</span>--}}
                                    {{--<span>in <a href="#">Web Design</a></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</div>--}}
                    {{--<div class="related-post col-sm-6 col-md-4" style="height: 94px;">--}}
                        {{--<article class="post">--}}
                            {{--<div class="post-image">--}}
                                {{--<div class="img">--}}
                                    {{--<img src="images/post/main/thumbnail/small/13.jpg" alt="">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="details">--}}
                                {{--<h5 class="post-title"><a href="#">Molestie eget vitae scelerisque</a></h5>--}}
                                {{--<div class="post-meta">--}}
                                    {{--<span>by <a href="#">Admin</a></span>--}}
                                    {{--<span>12 Nov, 2013</span>--}}
                                    {{--<span>in <a href="#">Web Design</a></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="comments-container">--}}
                    {{--<h3 class="font-normal">3 Comments</h3>--}}
                    {{--<ul class="commentlist">--}}
                        {{--<li>--}}
                            {{--<div class="comment">--}}
                                {{--<div class="author-img">--}}
                                    {{--<span><img src="images/post/author/medium4.jpg" alt=""></span>--}}
                                {{--</div>--}}
                                {{--<div class="comment-content">--}}
                                    {{--<h5 class="comment-author-name"><a href="#">Anna Brown</a></h5>--}}
                                    {{--<span class="comment-date">12 Nov, 2013<span class="dot">.</span>at 2:30 PM</span>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="comment-text col-sm-9 col-md-10">--}}
                                            {{--<p>Nulla mattis rsitmet dolor sollicitudi aliquamquae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo Lorem ipsum dolor sit amet gravida sagittis lacus. Morbi sit amet mauris mi.</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-3 col-md-2 text-right">--}}
                                            {{--<a href="#" class="btn btn-sm hover-blue style4">Reply</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<div class="comment">--}}
                                {{--<div class="author-img">--}}
                                    {{--<span><img src="images/post/author/medium3.jpg" alt=""></span>--}}
                                {{--</div>--}}
                                {{--<div class="comment-content">--}}
                                    {{--<h5 class="comment-author-name"><a href="#">Jessica Marvin</a></h5>--}}
                                    {{--<span class="comment-date">12 Nov, 2013<span class="dot">.</span>at 2:30 PM</span>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="comment-text col-sm-9 col-md-10">--}}
                                            {{--<p>Nulla mattis rsitmet dolor sollicitudi aliquamquae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo Lorem ipsum dolor sit amet gravida sagittis lacus. Morbi sit amet mauris mi.</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-3 col-md-2 text-right">--}}
                                            {{--<a href="#" class="btn btn-sm hover-blue style4">Reply</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<div class="comment">--}}
                                {{--<div class="author-img">--}}
                                    {{--<span><img src="images/post/author/medium1.jpg" alt=""></span>--}}
                                {{--</div>--}}
                                {{--<div class="comment-content">--}}
                                    {{--<h5 class="comment-author-name"><a href="#">Richard Black</a></h5>--}}
                                    {{--<span class="comment-date">12 Nov, 2013<span class="dot">.</span>at 2:30 PM</span>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="comment-text col-sm-9 col-md-10">--}}
                                            {{--<p>Nulla mattis rsitmet dolor sollicitudi aliquamquae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo Lorem ipsum dolor sit amet gravida sagittis lacus. Morbi sit amet mauris mi.</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-3 col-md-2 text-right">--}}
                                            {{--<a href="#" class="btn btn-sm hover-blue style4">Reply</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </article>
            {{--<div id="respond" class="comment-respond">--}}
                {{--<h3 class="font-normal">Post A Comment</h3>--}}
                {{--<form class="comment-form">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-4 form-group">--}}
                            {{--<input type="text" class="input-text full-width" placeholder="Full Name">--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-4 form-group">--}}
                            {{--<input type="text" class="input-text full-width" placeholder="Email Address">--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-4 form-group">--}}
                            {{--<input type="text" class="input-text full-width" placeholder="Your Website">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<textarea rows="8" class="input-text full-width" placeholder="Comment Type here"></textarea>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<button class="btn style1">Submit Message</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection