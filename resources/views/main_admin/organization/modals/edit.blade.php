<div class="col-lg-6 modal" id="organization-modal">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content organization-edit-form" method="post" action="{{ route('admin.organization.save', $organization ?? null) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Организация</h5>
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
                                <input name="title" class="form-control" type="text" placeholder="Введите наименование" value="{{ $organization->title ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Адрес:</label>
                            <div class="col-md-7">
                                <input name="address" class="form-control" type="text" placeholder="Введите адрес" value="{{ $organization->address ?? '' }}">
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