<div class="col-lg-6 modal" id="modal-staff">
    <div class="bs-component">
        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
            <div class="modal-dialog" role="document">
                <form class="modal-content admin-list-edit-form" method="post" action="{{ route('admin.staff.list.save', $admin) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Добавление администратора</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Имя:</label>
                            <div class="col-md-8">
                                <input name="name" class="form-control" type="text" placeholder="Введите имя">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Фамилия:</label>
                            <div class="col-md-8">
                                <input name="surname" class="form-control" type="text" placeholder="Введите фамилию">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Должность:</label>
                            <div class="col-md-8">
                                <input name="position" class="form-control" type="text" placeholder="Введите должность">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Телефон:</label>
                            <div class="col-md-8">
                                <input name="phone" class="form-control" type="text" placeholder="Введите номер телефона">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Email:</label>
                            <div class="col-md-8">
                                <input name="email" class="form-control" type="email" placeholder="Введите email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Роль:</label>
                            <div class="col-md-8">
                                <select class="select2" name="role">
                                    <option>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Сайты:</label>
                            <div class="col-md-8">
                                <select class="select2" multiple name="showcases[]">
                                    <option>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Группы:</label>
                            <div class="col-md-8">
                                <select class="select2" multiple name="groups[]">
                                    <option>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Компании:</label>
                            <div class="col-md-8">
                                <select class="select2" multiple name="companies[]">
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>