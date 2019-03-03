<div class="col-sm-6 col-md-3">
    <h5 class="section-title box">{{ $setting->title }}</h5>
    <div class="tags">
        @foreach(data_get($setting, 'items', []) as $item)
            <a href="{{ url($item->link) }}" class="tag">{{ $item->title }}</a>
        @endforeach
    </div>
</div>