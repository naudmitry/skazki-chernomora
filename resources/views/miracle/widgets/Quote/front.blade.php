<blockquote class="{{ $setting->style }} box">
    <p>{{ $setting->content }}</p>
    @if ($setting->signature)
        <span class="name">{{ $setting->signature }}</span>
    @endif
</blockquote>