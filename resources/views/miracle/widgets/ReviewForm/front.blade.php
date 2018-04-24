<div class="section" data-widget="{{ $widget_class }}" @if (isset($setting->padding) && strlen($setting->padding) > 0) style="padding: {{ $setting->padding }}" @endif>
    <div class="alert alert-success" hidden>
        <p>Спасибо, ваш отзыв принят и в скором времени будет обработан нашим менеджером.</p>
        <span class="close"></span>
    </div>

    <div class="container">
        <div class="row">
            <h4>{{ $setting->title }}</h4>
            <form action="{{ route('site.review.save') }}" method="post" class="send-review-form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="input-text full-width" name="customer_name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="input-text full-width" name="email">
                </div>
                <div class="form-group">
                    <label>Оценка</label>
                    <input type="hidden" value="" id="review_score">
                    <span class="input-star-rating">
                        <input type="radio" name="rating" value="5">
                        <input type="radio" name="rating" value="4">
                        <input type="radio" name="rating" value="3">
                        <input type="radio" name="rating" value="2">
                        <input type="radio" name="rating" value="1">
                    </span>
                </div>
                <div class="form-group">
                    <label>Ваш отзыв</label>
                    <textarea rows="5" class="input-text full-width" name="review"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>