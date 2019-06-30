<div class="parallax-elem" data-widget="{{ $widget_class }}">
    <div class="video-container mejs-skin">
        <video poster="{{ $setting->poster_link }}" preload="none" data-stellar-ratio="0.5" data-video-format="16:9">
            <source src="{{ $setting->video_link }}" type="video/youtube" />
        </video>
        <div class="video-text">
            <div class="container">
                <div class="heading-box">
                    <h2 class="box-title color-white">{{ $setting->title }}</h2>
                    <h3 class="skin-color">{{ $setting->subtitle }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>