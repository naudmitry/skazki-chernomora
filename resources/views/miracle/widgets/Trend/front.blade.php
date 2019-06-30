<div class="section trend-section" data-widget="{{ $widget_class }}">
    <div class="container text-center">
        @if ($setting->image_link)
            <div class="image-container trend-image">
                <img src="{{ $setting->image_link }}" alt="" class="">
            </div>
        @endif
        <div class="heading-box col-md-10 col-lg-8">
            <h2 class="box-title">{{ $setting->title }}</h2>
            <br>
            <p>{{ $setting->sub_title }}</p>
        </div>
        <div class="box">&nbsp;</div>
        <div class="progress-bar-container style-vertical">
            <div class="progress-bar-wrapper">
                @foreach(data_get($setting, 'items', []) as $item)
                    <div class="progress-bar animate-progress style-colored">
                        <span class="progress-percent"><span>{{ $item->percent }}%</span></span>
                        <div class="progress"><span class="progress-inner" data-percent="{{ $item->percent }}"><span class="progress-label"><span>{{ $item->title }}</span></span></span></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>