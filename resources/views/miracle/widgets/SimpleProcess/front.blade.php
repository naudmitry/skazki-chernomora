<div class="section-info">
    <ul class="process-builder style-simple items-4 clearfix">
        @foreach(data_get($setting, 'items', []) as $item)
            <li class="process-item">
                <div class="process-icon">
                    <i class="fa fa-{{ $item->icon }}"></i>
                </div>
                <div class="process-details">
                    <h4 class="process-title">{{ $item->title }}</h4>
                    <p>{{ $item->subtitle }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>