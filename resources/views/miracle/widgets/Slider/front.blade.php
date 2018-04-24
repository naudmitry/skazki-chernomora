<div id="slideshow" data-widget="{{ $widget_class }}">
    <div class="revolution-slider">
        <ul>
            @foreach(data_get($setting, 'items', []) as $item)
                <li data-transition="{{ $item->transition }}" data-slotamount="7" data-masterspeed="{{ $item->speed }}">
                    <img src="{{ $item->image_link }}" alt="slider">
                </li>
            @endforeach
        </ul>
    </div>
</div>