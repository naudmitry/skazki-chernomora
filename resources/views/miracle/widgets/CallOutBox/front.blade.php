<div class="callout-box style3 showcase-widget" data-widget="{{ $widget_class }}">
    <div class="container">
        <div class="callout-content">
            <div class="callout-text">
                <h2>{{ $setting->title }}</h2>
            </div>

            @if ($setting->is_button_show)
                <div class="callout-action">
                    <a class="btn style3" href="{{ url($setting->link) }}">{{ $setting->button }}</a>
                </div>
            @endif
        </div>
    </div>
</div>