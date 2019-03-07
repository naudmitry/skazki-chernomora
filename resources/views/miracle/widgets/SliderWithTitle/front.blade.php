<div class="post-slider style3 owl-carousel box">
    @foreach(data_get($setting, 'items', []) as $item)
        <a href="{{ $item->image_link }}" class="soap-mfp-popup">
            <img src="{{ $item->image_link }}" alt="slider">
            <div class="slide-text caption-animated" data-animation-type="slideInLeft" data-animation-duration="2">
                <h4 class="slide-title">{{ $item->title }}</h4>
                <p>{{ $item->subtitle }}</p>
            </div>
        </a>
    @endforeach
</div>