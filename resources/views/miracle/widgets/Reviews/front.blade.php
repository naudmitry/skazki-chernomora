<div class="section showcase-widget" data-widget="{{ $widget_class }}">
    <div class="container">
        <div class="heading-box">
            <h2 class="box-title">{{ $setting->title }}</h2>
            <p class="desc-lg">{{ $setting->subtitle }}</p>
        </div>
        <div class="testimonials style1 owl-carousel box-lg" data-transitionstyle="fade">
            @foreach ($reviews as $review)
                <div class="testimonial style1">
                    <div class="testimonial-image">
                        <img src="{{ $review->avatar_link }}" alt="{{ $review->review  }}">
                    </div>
                    <div class="testimonial-content fontsize-lg">
                        {{ $review->review }}
                    </div>

                    <div class="testimonial-author">
                        @if ($buyer = $review->buyer)
                            <span class="testimonial-author-name">{{ $buyer->full_name }}</span> - <span class="testimonial-author-job">{{ $review->customer_position }}</span>
                        @else
                            <span class="testimonial-author-name">{{ $review->customer_name }}</span> - <span class="testimonial-author-job">{{ $review->customer_position }}</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>