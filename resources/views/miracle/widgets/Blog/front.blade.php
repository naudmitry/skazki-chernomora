<div class="section showcase-widget" data-widget="{{ $widget_class }}">
    <div class="container">
        <div class="heading-box">
            <h2 class="box-title">{{ $setting->title }}</h2>
            <p class="desc-lg">{{ $setting->subtitle }}</p>
        </div>
        <div class="row blog-posts">
            @foreach ($blogs as $blog)
                <div class="col-sm-4">
                    <article class="post post-masonry">
                        <div class="post-image">
                            <div class="image">
                                <img src="http://placehold.it/780x390" alt="">
                                <div class="image-extras">
                                    <a href="#" class="post-gallery"></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="post-author">
                                <a href="#"><img src="http://placehold.it/100x100" alt=""></a>
                            </div>
                            <div class="post-meta">
                                <span class="entry-author fn">By <a href="#">Admin</a></span>
                                <span class="entry-time"><span class="updated no-display">2014-09-09T15:57:08+00:00</span><span class="published">12 Nov, 2014</span></span>
                                <span class="post-category">in <a href="#">Web Design</a></span>
                            </div>
                            <h3 class="entry-title"><a href="#">{{ $blog->name }}</a></h3>
                            {!! mb_strimwidth(strip_tags($blog->content), 0, 100, "...") !!}
                        </div>
                        <div class="post-action">
                            <a href="#" class="btn btn-sm style3 post-comment"><i class="fa fa-comment"></i>25</a>
                            <a href="#" class="btn btn-sm style3 post-like"><i class="fa fa-heart"></i>480</a>
                            <a href="#" class="btn btn-sm style3 post-share"><i class="fa fa-share"></i>Share</a>
                            <a href="#" class="btn btn-sm style3 post-read-more">More</a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</div>