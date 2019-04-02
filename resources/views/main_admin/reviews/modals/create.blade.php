<div class="col-lg-6 modal" id="review-modal">
    <div class="bs-component">
        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
            <div class="modal-dialog" role="document">
                <form
                        autocomplete="off"
                        class="modal-content review-create-form"
                        method="post"
                        action="{{ route('admin.review.save') }}">

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
                            <label class="control-label col-md-3">Описание:</label>
                            <div class="col-md-8">
                                <input name="surname" class="form-control" type="text" placeholder="Введите фамилию" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Ответ:</label>
                            <div class="col-md-8">
                                <input name="name" class="form-control" type="text" placeholder="Введите имя" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Статус:</label>
                            <div class="col-md-8">
                                <select class="select2" name="gender">
                                    @foreach (\App\Classes\ReviewStatusEnum::lists() as $status)
                                        <option
                                                value="{{ $status }}"
                                        >{{ trans('review.status.' . $status) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Показать:</label>
                            <div class="toggle-flip col-md-8">
                                <label class="mb-0">
                                    <input
                                            type="checkbox"
                                            class="checkbox entity-availability"
                                    ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                </label>
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