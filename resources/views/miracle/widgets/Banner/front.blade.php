<div class="page-title-container style5" data-widget="{{ $widget_class }}">
    <div class="banner parallax" data-stellar-background-ratio="0.5" style="background-image:url({{ $setting->image_link }})">
        <div class="container">
            <div class="caption-wrapper position-right">
                <div class="caption">
                    <h1 class="caption-lg" style="color:{{ $setting->title_color ?? '' }}">{{ $setting->title }}</h1>
                    <h5 class="caption-sm" style="color:{{ $setting->subtitle_color ?? '' }}">{{ $setting->subtitle }}</h5>
                </div>
            </div>
        </div>
    </div>
    @if ($setting->is_breadcrumbs)
        @include('miracle.vendor.breadcrumbs')
    @endif
</div>