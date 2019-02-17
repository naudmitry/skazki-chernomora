<div class="post-wrapper">
    <div class="owl-carousel post-slider style6" data-items="4" data-itemsPerDisplayWidth="[[0, 1], [480, 1], [768, 2], [992, 3], [1200, 4]]">
        @foreach(data_get($setting, 'items', []) as $item)
            <article class="post">
                <figure><img alt="" src="{{ $item->image_link }}"></figure>
                <div class="portfolio-hover-holder">
                    <div class="portfolio-text">
                        <div class="portfolio-text-inner">
                            <h5 class="portfolio-title">{{ $item->title }}</h5> - <span class="portfolio-category">{{ $item->category }}</span>
                        </div>
                    </div>
                    <span class="portfolio-action">
                        <a href="{{ $item->image_link }}" class="soap-mfp-popup"><i class="fa fa-eye has-circle"></i></a>
                        <a href="portfolio-single1.html"><i class="fa fa-chain has-circle"></i></a>
                    </span>
                </div>
            </article>
        @endforeach
    </div>
    <div class="title-section">
        <div class="title-section-wrapper">
            <div class="container">
                <p>{{ $setting->title }}</p>
            </div>
        </div>
    </div>
</div>