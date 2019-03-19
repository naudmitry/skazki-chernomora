<div class="section-info">
    <div class="soap-gallery metro-style gallery-col-3">
        <div class="gallery-wrapper">
            @foreach(data_get($setting, 'items', []) as $item)
                <a href="{{ $item->image_link }}" class="image hover-style3">
                    <img src="{{ $item->image_link }}" alt="image">
                    <div class="image-extras"></div>
                </a>
            @endforeach
        </div>
    </div>
</div>