<div class="section" data-widget="{{ $widget_class }}">
    <div class="container">
        <div class="heading-box">
            <h2 class="box-title">{{ $setting->title }}</h2>
            <p class="desc-lg">{{ $setting->subtitle }}</p>
        </div>
        <div class="row">
            @foreach(data_get($setting, 'items', []) as $item)
                <div class="col-sm-6 col-md-3">
                    <div class="circle-wrap box">
                        <div class="circle-progress" data-bgcolor="#edf6ff" data-fgcolor="#1b4268" data-percent="{{ $item->percent }}" data-text="{{ $item->percent }}<span>%</span>" data-dimension="150" data-bordersize="7" data-fontsize="30"></div>
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->subtitle }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>