<div class="col-sm-6 col-md-3" data-widget="{{ $widget_class }}">
    <h5 class="section-title box">{{ $setting->title }}</h5>
    <p>{{ $setting->subtitle }}</p>
    <div class="social-icons">
        @foreach(data_get($setting, 'items', []) as $item)
            <a href="{{ url($item->link) }}" class="social-icon">
                <i class="fa fa-{{ $item->icon }} has-circle" data-toggle="tooltip" data-placement="top" title="{{ $item->title }}"></i>
            </a>
        @endforeach
    </div>
    <a href="{{ url($setting->button_link) }}" class="btn btn-sm style4">{{ $setting->button_title }}</a>
    <a href="#" class="back-to-top"><span></span></a>
</div>