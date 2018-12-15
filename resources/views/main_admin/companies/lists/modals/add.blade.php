<div class="col-lg-6 modal" id="modal-add-company">
    <div class="bs-component">
        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
            <div class="modal-dialog" role="document">
                <form class="modal-content company-add-form" method="post" action="{{ route('admin.company.create') }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Добавление компании</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Наименование:</label>
                            <div class="col-md-8">
                                <input name="title" class="form-control" type="text" placeholder="Введите наименование">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Страна:</label>
                            <div class="col-md-8">
                                <select class="select2" name="country_id">
                                    @foreach ($countries as $country)
                                        <option
                                                value="{{ $country->id }}"
                                        >{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <h2 class="mb-3 line-head">Администратор</h2>

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
                            <label class="control-label col-md-3">Телефон:</label>
                            <div class="col-md-8">
                                <input name="phone" class="form-control" placeholder="Введите номер телефона">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Email:</label>
                            <div class="col-md-8">
                                <input name="email" class="form-control" type="email" placeholder="Введите email">
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