<div class="container">
    <div id="main">
        <div class="section-info {{ $setting->is_header_show ? 'section-info-line' : '' }}">
            @if ($setting->is_header_show)
                <h3 class="section-title">{{ $setting->title }}</h3>
            @endif
            <div class="soap-gallery owl-carousel style1">
                @foreach(data_get($setting, 'items', []) as $item)
                    <img src="{{ url($item->image_link) }}" alt="{{ $item->title }}">
                @endforeach
            </div>
        </div>
    </div>
</div>