<div class="section-info">
    <div class="tab-container vertical-tab">
        <ul class="tabs">
            @foreach(data_get($setting, 'items', []) as $item)
                <li class="{{ $loop->iteration == 1 ? 'active' : '' }}">
                    <a href="#tab3-{{ $loop->iteration }}" data-toggle="tab">{{ $item->title }}</a>
                </li>
            @endforeach
        </ul>
        @foreach(data_get($setting, 'items', []) as $item)
            <div id="tab3-{{ $loop->iteration }}" class="tab-content {{ $loop->iteration == 1 ? 'active' : '' }}">
                <div class="tab-pane">
                    {!! $item->text !!}
                </div>
            </div>
        @endforeach
    </div>
</div>