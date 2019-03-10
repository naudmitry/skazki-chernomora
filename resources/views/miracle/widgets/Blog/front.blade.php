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
                                <img class="widget-blog-img" src="{{ $blog->link }}" alt="{{ $blog->title }}">
                                <div class="image-extras">
                                    <a href="{{ $blog->getRoute() }}" class="post-gallery"></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <span class="entry-author fn">{{ $blog->author->full_name }}</span>
                                <span class="entry-time"><span class="updated no-display">{{ $blog->getFormatUpdatedAtAttribute() }}</span><span class="published">{{ $blog->getFormatCreatedAtAttribute() }}</span></span>
                            </div>
                            <h3 class="entry-title"><a href="{{ $blog->getRoute() }}">{{ mb_strimwidth($blog->name, 0, 24, "...") }}</a></h3>
                            <p>{!! mb_strimwidth(strip_tags($blog->content), 0, 110, "...") !!}</p>
                        </div>
                        <div class="post-action">
                            <a href="{{ $blog->getRoute() }}" class="btn btn-sm style3 post-read-more">Подробнее</a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</div>