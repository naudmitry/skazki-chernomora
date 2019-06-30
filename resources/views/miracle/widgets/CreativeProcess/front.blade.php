<div class="container" data-widget="{{ $widget_class }}">
    <div id="main">
        <div class="section-info {{ $setting->is_header_show ? 'section-info-line' : '' }}">
            @if ($setting->is_header_show)
                <h3 class="section-title">{{ $setting->title }}</h3>
            @endif

            <ul class="process-builder style-creative clearfix same-height">
                @foreach(data_get($setting, 'items', []) as $item)
                    <li class="process-item">
                        <div class="process-inside animated" data-animation-type="fadeInLeft" data-animation-delay="0" data-animation-duration="1.5">
                            <div class="process-image">
                                <img src="{{ $item->image_link }}" alt="{{ $item->title }}">
                            </div>
                            <div class="process-details">
                                <h4 class="process-title">{{ $item->title }}</h4>
                            </div>
                        </div>
                        <span class="arrow animated" data-animation-type="fadeInLeft" data-animation-delay="0.5" data-animation-duration="1"></span>
                    </li>
                @endforeach

                <li class="assets-item">
                    <div class="process-image animated" data-animation-type="fadeInLeft" data-animation-delay="1.5" data-animation-duration="2">
                        <img src="{{ $setting->image_link }}" alt="{{ $setting->title }}">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>