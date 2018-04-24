<div class="section" data-widget="{{ $widget_class }}">
    @if ($setting->is_header_show)
        <h2 class="section-title">{{ $setting->title }}</h2>
    @endif
    <div class="container">
        <div class="row">
            @foreach(data_get($setting, 'items', []) as $item)
                <div class="col-sm-4">
                    <div class="icon-box style-side-1 box animated" data-animation-type="fadeInUp" data-animation-delay="0">
                        <i class="fa fa-{{ $item->icon }}"></i>
                        <div class="box-content">
                            <h4 class="box-title"><a href="{{ $item->link }}">{{ $item->title }}</a></h4>
                            <p>{{ $item->subtitle }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>