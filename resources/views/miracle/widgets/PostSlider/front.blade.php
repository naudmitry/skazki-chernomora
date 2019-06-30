<div class="container" data-widget="{{ $widget_class }}">
    <div id="main">
        <div class="row">
            <div class="col-sm-6 col-md-8">
                <div class="post-slider style1 owl-carousel box">
                    @foreach(data_get($setting, 'items', []) as $item)
                        <a href="{{ url($item->image_link) }}" class="soap-mfp-popup">
                            <img src="{{ url($item->image_link) }}" alt="{{ $item->title }}">
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <h3>{{ $setting->title }}</h3>
                <p>{{ $setting->subtitle }}</p>
            </div>
        </div>

        @if ($setting->is_header_show)
            <hr class="color-light1">
        @endif
    </div>
</div>