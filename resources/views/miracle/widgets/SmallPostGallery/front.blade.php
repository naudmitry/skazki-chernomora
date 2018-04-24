<div class="container" data-widget="{{ $widget_class }}">
    <div id="main">
        <div class="section-info {{ $setting->is_header_show ? 'section-info-line' : '' }}">
            @if ($setting->is_header_show)
                <h3 class="section-title">{{ $setting->title }}</h3>
            @endif
            <div class="soap-gallery small-post">
                <div class="row">
                    @foreach(data_get($setting, 'items', []) as $item)
                        <div class="col-sms-6 col-sm-4 col-md-2">
                            <article>
                                <a href="{{ url($item->image_link) }}" class="image soap-mfp-popup">
                                    <img src="{{ url($item->image_link_small) }}" alt="{{ $item->title }}">
                                    <div class="image-extras"></div>
                                </a>
                                <div class="post-content">
                                    <h6 class="post-title"><a href="{{ url($item->link) }}">{{ $item->title }}</a></h6>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>