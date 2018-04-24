<div class="page-title-container parallax style3" data-stellar-background-ratio="0.5" style="background-image:url({{ $setting->image_link }})" data-widget="{{ $widget_class }}">
    <div class="page-title">
        <div class="container">
            <h1 class="entry-title" style="color: {{ $setting->title_color ?? '' }}">{{ $setting->title }}</h1>
        </div>
    </div>
    @include('miracle.vendor.breadcrumbs')
</div>
