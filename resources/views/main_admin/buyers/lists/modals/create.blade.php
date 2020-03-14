<div class="col-lg-6 modal" id="buyer-modal">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content buyer-create-form" method="post" action="{{ route('admin.buyers.create') }}">
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
                            <label class="control-label col-md-4">Администратор:</label>
                            <div class="col-md-8">
                                <select name="admin_id" class="select2">
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Фамилия:</label>
                            <div class="col-md-8">
                                <input name="surname" class="form-control" type="text" placeholder="Введите фамилию" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Имя:</label>
                            <div class="col-md-8">
                                <input name="name" class="form-control" type="text" placeholder="Введите имя" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Отчество:</label>
                            <div class="col-md-8">
                                <input name="middle_name" class="form-control" type="text" placeholder="Введите отчество" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Email:</label>
                            <div class="col-md-8">
                                <input name="email" class="form-control" type="email" placeholder="Введите email" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Телефон:</label>
                            <div class="col-md-8">
                                <input name="phone_number" class="form-control" type="text" placeholder="Введите телефон" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Пол:</label>
                            <div class="col-md-8">
                                <select class="select2" name="gender">
                                    @foreach (\App\Classes\GenderEnum::lists() as $gender)
                                        <option
                                                value="{{ $gender }}"
                                        >{{ trans('gender.' . $gender) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Организация:</label>
                            <div class="col-md-8">
                                <select class="select2" name="organization_id">
                                    <option value="">Нет</option>
                                    @foreach ($organizations as $organization)
                                        <option
                                                value="{{ $organization->id }}"
                                        >{{ $organization->title }}</option>
                                    @endforeach
                                </select>
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