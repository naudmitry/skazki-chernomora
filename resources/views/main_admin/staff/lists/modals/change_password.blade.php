<div class="col-lg-6 modal" id="change-password-modal">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content admin-change-password-form" method="post" action="{{ route('admin.staff.change-password', $admin) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Смена пароля</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-4" for="password">Пароль:</label>
                            <div class="col-md-7">
                                <input id="password" name="password" class="form-control" type="text" placeholder="Введите пароль" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4" for="password_confirmation">Повторите пароль:</label>
                            <div class="col-md-7">
                                <input id="password_confirmation" name="password_confirmation" class="form-control" type="text" placeholder="Повторите пароль" value="">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">
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