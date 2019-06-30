<div class="container">
    <div id="main">
        <div class="row">
            <div class="col-sm-6 col-md-8">
                <div class="post-slider style4 owl-carousel box">
                    @foreach(data_get($setting, 'items', []) as $item)
                        <a href="{{ $item->image_link }}" class="soap-mfp-popup">
                            <img src="{{ $item->image_link }}" alt="{{ $item->title }}">
                            <div class="slide-text">
                                <div class="caption-wrapper">
                                    <h2 class="caption caption-animated size-lg" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0">{{ $item->title }}</h2>
                                    <br>
                                    <h3 class="caption caption-animated size-md" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="1">{{ $item->subtitle }}</h3>
                                </div>
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