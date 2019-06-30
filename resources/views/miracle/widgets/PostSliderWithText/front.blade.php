<div class="container" data-widget="{{ $widget_class }}">
    <div id="main">
        <div class="row">
            <div class="col-sm-6 col-md-8">
                <div class="post-slider style2 owl-carousel box">
                    @foreach(data_get($setting, 'items', []) as $item)
                        <a href="{{ $item->image_link }}" class="soap-mfp-popup">
                            <img src="{{ $item->image_link }}" alt="{{ $item->title }}">
                            <div class="slide-text">
                                <h4 class="slide-title">{{ $item->title }}</h4>
                                <span class="meta-info">{{ $item->subtitle }}</span>
                            </div>
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