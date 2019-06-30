<blockquote class="{{ $setting->style }} box" data-widget="{{ $widget_class }}">
    <p>{{ $setting->content }}</p>
    @if ($setting->signature)
        <span class="name">{{ $setting->signature }}</span>
    @endif
</blockquote>