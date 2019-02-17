<div id="slideshow">
    <div class="revolution-slider">
        <ul>
            @foreach(data_get($setting, 'items', []) as $item)
                <li data-transition="{{ $item->transition }}" data-slotamount="{{ $item->slot_amount }}" data-masterspeed="{{ $item->speed }}">
                    <img src="{{ $item->image_link }}" alt="">
                </li>
            @endforeach
        </ul>
    </div>
</div>