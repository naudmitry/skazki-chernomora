<div class="col-lg-6 modal" id="buyer-modal">
    <div class="bs-component">
        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
            <div class="modal-dialog" role="document">
                <form
                        autocomplete="off"
                        class="modal-content buyer-create-form"
                        method="post"
                        action="{{ route('admin.buyer.list.create') }}">

                    <div class="modal-header">
                        <h5 class="modal-title">Клиент</h5>
                        <button
                                class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                        ><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Фамилия:</label>
                            <div class="col-md-8">
                                <input name="surname" class="form-control" type="text" placeholder="Введите фамилию" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Имя:</label>
                            <div class="col-md-8">
                                <input name="name" class="form-control" type="text" placeholder="Введите имя" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Отчество:</label>
                            <div class="col-md-8">
                                <input name="middle_name" class="form-control" type="text" placeholder="Введите отчество" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Email:</label>
                            <div class="col-md-8">
                                <input name="email" class="form-control" type="email" placeholder="Введите email" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Телефон:</label>
                            <div class="col-md-8">
                                <input name="phone_number" class="form-control" type="text" placeholder="Введите телефон" value="">
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