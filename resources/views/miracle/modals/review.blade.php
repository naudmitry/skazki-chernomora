<div class="modal fade" id="reviewModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Написать отзыв</h4>
            </div>

            <form action="{{ route('site.review.save') }}" method="post" class="send-review-form">
                {{ csrf_field() }}
                <div class="modal-body">
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
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>