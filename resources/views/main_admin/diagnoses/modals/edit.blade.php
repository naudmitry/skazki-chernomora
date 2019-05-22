<div class="col-lg-6 modal" id="diagnosis-modal">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content diagnosis-list-edit-form" method="post" action="{{ route('admin.diagnosis.list.save', $diagnosis ?? null) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Диагноз</h5>
                        <button
                                class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                        ><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-5">Наименование:</label>
                            <div class="col-md-6">
                                <input name="title" class="form-control" type="text" placeholder="Введите наименование" value="{{ $diagnosis->title ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-5">Количество посещений:</label>
                            <div class="col-md-6">
                                <input name="count_visits" class="form-control" type="text" placeholder="Введите количество посещений" value="{{ $diagnosis->count_visits ?? '' }}">
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