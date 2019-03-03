<div class="col-sm-6 col-md-3">
    <h5 class="section-title box">{{ $setting->title }}</h5>
    <ul class="arrow useful-links">
        @foreach(data_get($setting, 'items', []) as $item)
            <li><a href="{{ url($item->link) }}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
</div>