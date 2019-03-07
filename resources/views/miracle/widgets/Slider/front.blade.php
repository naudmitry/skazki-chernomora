<div id="slideshow">
    <div class="revolution-slider">
        <ul>
            @foreach(data_get($setting, 'items', []) as $item)
                <li data-transition="{{ $item->transition }}" data-slotamount="7" data-masterspeed="{{ $item->speed }}">
                    <img src="{{ $item->image_link }}" alt="slider">

                    <div class="tp-caption lft fadeout tp-resizeme"
                         data-x="center"
                         data-hoffset="0"
                         data-y="240"
                         data-speed="600"
                         data-start="500"
                         data-easing="easeInCubic"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         style="z-index: 2;
                         max-width: auto;
                         max-height: auto;
                         white-space: nowrap;"
                    ><h2 class="caption-xl">{{ $item->title ?? '' }}</h2></div>

                    <div class="tp-caption lfl fadeout tp-resizeme"
                         data-x="center"
                         data-hoffset="0"
                         data-y="320"
                         data-speed="600"
                         data-start="700"
                         data-easing="easeInOutCubic"
                         data-splitin="none"
                         data-splitout="none"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         style="z-index: 3;
                         max-width: auto;
                         max-height: auto;
                         white-space: nowrap;"
                    ><h2 class="caption-md skin-color">{{ $item->subtitle ?? '' }}</h2>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>