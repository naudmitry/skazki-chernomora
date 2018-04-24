<div class="container" data-widget="{{ $widget_class }}">
    <div id="main">
        <div class="section-info {{ $setting->is_header_show ? 'section-info-line' : '' }}">
            @if ($setting->is_header_show)
                <h3 class="section-title">{{ $setting->title }}</h3>
            @endif
            <div class="soap-gallery metro-style gallery-col-3">
                <div class="gallery-wrapper">
                    @foreach(data_get($setting, 'items', []) as $item)
                        <a href="{{ $item->image_link }}" class="image hover-style3">
                            <img src="{{ $item->image_link }}" alt="{{ $item->title }}">
                            <div class="image-extras"></div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>