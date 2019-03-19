<div class="section-info">
    <div class="soap-gallery small-post">
        <div class="row">
            @foreach(data_get($setting, 'items', []) as $item)
                <div class="col-sms-6 col-sm-4 col-md-2">
                    <article>
                        <a href="{{ $item->image_link }}" class="image soap-mfp-popup">
                            <img src="{{ $item->image_link }}" alt="">
                            <div class="image-extras"></div>
                        </a>
                        <div class="post-content">
                            <h6 class="post-title"><a href="#">{{ $item->title }}</a></h6>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</div>