<li class="menu-item-has-children showcase-widget {{ (Request::url() == url($setting->link) ? 'active' : '') }}" data-widget="{{ $widget_class }}">
    <a href="{{ url($setting->link) }}">{{ $setting->title }}</a>
</li>