<div class="col-sm-6 col-md-3" data-widget="{{ $widget_class }}">
    <h5 class="section-title box">{{ $setting->title }}</h5>
    <ul class="recent-posts">
        @foreach ($blogs as $blog)
            <li>
                <a href="#" class="post-author-avatar"><span><img src="http://placehold.it/50x50" alt=""></span></a>
                <div class="post-content">
                    <a href="{{ $blog->getRoute() }}" class="post-title">{{ mb_strimwidth($blog->name, 0, 27, "...") }}</a>
                    <p class="post-meta">By <a href="#">Admin</a>  .  12 Nov, 2014</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>