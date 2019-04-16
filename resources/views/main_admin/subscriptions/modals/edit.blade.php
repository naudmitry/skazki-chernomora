<div class="col-lg-6 modal" id="subscription-modal">
    <div class="bs-component">
        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content subscription-edit-form" method="post" action="{{ route('admin.subscription.save', $subscription ?? null) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Абонемент</h5>
                        <button
                                class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                        ><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-4">Наименование:</label>
                            <div class="col-md-7">
                                <input name="title" class="form-control" type="text" placeholder="Введите наименование" value="{{ $subscription->title ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Тип:</label>
                            <div class="col-md-7">
                                <input name="type" class="form-control" type="text" placeholder="Введите тип" value="{{ $subscription->type ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Количество сеансов:</label>
                            <div class="col-md-7">
                                <input name="amount_sessions" class="form-control" type="text" placeholder="Введите количество сеансов" value="{{ $subscription->amount_sessions ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Стоимость:</label>
                            <div class="col-md-7">
                                <input name="cost" class="form-control" type="text" placeholder="Введите стоимость" value="{{ $subscription->cost ?? '' }}">
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