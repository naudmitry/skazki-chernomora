<div class="col-lg-6 modal" id="ad-source-modal">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content ad-source-list-edit-form" method="{{ $source ? 'patch' : 'post' }}" action="{{ $source ? route('admin.ad-sources.update', $source) : route('admin.ad-sources.store') }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Источник рекламы</h5>
                        <button
                                class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                        ><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Наименование:</label>
                            <div class="col-md-8">
                                <input name="title" class="form-control" type="text" placeholder="Введите наименование" value="{{ $source->title ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Позиция:</label>
                            <div class="col-md-8">
                                <input name="sort" class="form-control" type="text" placeholder="Введите позицию" value="{{ $source->sort ?? '' }}">
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