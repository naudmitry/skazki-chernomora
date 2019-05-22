<div class="col-lg-6 modal" id="review-modal">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content review-create-form" method="post" action="{{ route('admin.review.save') }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Отзыв</h5>
                        <button
                                class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                        ><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-4">Имя клиента:</label>
                            <div class="col-md-8">
                                <input name="customer_name" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Должность клиента:</label>
                            <div class="col-md-8">
                                <input name="customer_position" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Отзыв:</label>
                            <div class="col-md-8">
                                <textarea name="review" rows="4" cols="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Рейтинг:</label>
                            <div class="col-md-8">
                                <select class="select2" name="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" @if ($i == 5) selected @endif>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <label class="control-label col-md-4">Показать в виджетах:</label>
                            <div class="toggle-flip col-md-8">
                                <label class="mb-0">
                                    <input
                                            type="checkbox"
                                            class="checkbox entity-availability"
                                            name="is_widget"
                                    ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Ответ:</label>
                            <div class="col-md-8">
                                <textarea name="reply" rows="4" cols="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-default" type="submit" disabled>
                            <i class="fas fa-check-circle mr-2"></i>Сохранить
                        </button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                            <i class="fas fa-ban mr-2"></i>Отменить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>