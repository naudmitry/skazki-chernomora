<div class="col-sm-6 col-md-3" data-widget="{{ $widget_class }}">
    <h5 class="section-title box">{{ $setting->title }}</h5>
    <ul class="recent-posts">
        @foreach ($blogs as $blog)
            <li>
                <a href="#" class="post-author-avatar"><span><img class="widget-recent-post-img" src="{{ $blog->link }}" alt="{{ $blog->title }}"></span></a>
                <div class="post-content">
                    <a href="{{ $blog->getRoute() }}" class="post-title">{{ mb_strimwidth($blog->name, 0, 27, "...") }}</a>
                    <p class="post-meta">{{ $blog->author->full_name ?? '' }} . {{ strftime('%d %B %G', strtotime($blog->created_at)) }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>