<div
    class="parallax has-caption parallax-image2 showcase-widget"
    data-stellar-background-ratio="0.5"
    data-widget="{{ $widget_class }}"
    style="background-image:url({{ $setting->image_link }})"
>
    <div class="caption-wrapper">
        <h2
            class="caption animated size-lg"
            data-animation-type="fadeInLeft"
            data-animation-duration="2"
            data-animation-delay="0"
        >{{ $setting->title }}</h2>
        <br>
        <h3
            class="caption animated size-md"
            data-animation-type="fadeInLeft"
            data-animation-duration="2"
            data-animation-delay="1"
        >{{ $setting->subtitle }}</h3>
    </div>
</div>