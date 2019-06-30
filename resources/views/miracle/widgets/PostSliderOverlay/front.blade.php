<div class="container" data-widget="{{ $widget_class }}">
    <div id="main">
        <div class="row">
            <div class="col-md-8">
                <ul class="post-slider style5 owl-carousel box" data-transitionstyle="fade">
                    @foreach(data_get($setting, 'items', []) as $item)
                        <li>
                            <a href="{{ $item->image_link }}" class="soap-mfp-popup">
                                <img src="{{ $item->image_link }}" alt="{{ $item->title }}">
                            </a>
                            <div class="slide-text">
                                <div class="caption-wrapper">
                                    <p>{{ $item->subtitle }}</p>
                                    @if ($item->is_button_show)
                                        <a href="{{ $item->button_link }}" class="btn btn-sm style4">{{ $item->button_text }}</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4">
                <h3>{{ $setting->title }}</h3>
                <p>{{ $setting->subtitle }}</p>
            </div>
        </div>

        @if ($setting->is_header_show)
            <hr class="color-light1">
        @endif
    </div>
</div>