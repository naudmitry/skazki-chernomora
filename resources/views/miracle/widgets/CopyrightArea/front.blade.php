<div class="footer-bottom-area">
    <div class="container">
        <div class="copyright-area">
            <nav class="secondary-menu">
                <ul class="nav nav-pills">
                    @foreach(data_get($setting, 'items', []) as $item)
                        <li><a href="{{ url($item->link) }}">{{ $item->title }}</a></li>
                    @endforeach
                </ul>
            </nav>
            <div class="copyright">
                {{ $setting->copyright }}
            </div>
        </div>
    </div>
</div>