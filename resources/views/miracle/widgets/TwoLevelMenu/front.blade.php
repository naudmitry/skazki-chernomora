<li class="menu-item-has-children showcase-widget" data-widget="{{ $widget_class }}">
    <span class="open-subnav"></span>
    <a href="#">{{ $setting->title }}</a>
    <ul class="sub-nav">
        @foreach(data_get($setting, 'items', []) as $item)
            <li class="{{ (Request::url() == url($item->link) ? 'active' : '') }}"><a href="{{ url($item->link) }}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
</li>