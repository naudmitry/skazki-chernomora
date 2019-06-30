<div class="section" data-widget="{{ $widget_class }}">
    <div class="container">
        <div class="row">
            @foreach(data_get($setting, 'items', []) as $item)
                <div class="col-sm-4">
                    <div class="icon-box style-side-2 animated box" data-animation-type="fadeInUp" data-animation-delay="{{ $item->animation_delay }}">
                        <i class="fa fa-{{ $item->icon }}"></i>
                        <div class="box-content">
                            <h4 class="box-title"><a href="{{ url($item->link) }}">{{ $item->title }}</a></h4>
                            <p>{{ $item->subtitle }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>