<div class="col-lg-6 modal" id="help-desks-modal">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content help-desks-edit-form" method="patch" action="{{ route('admin.help-desks.update', $helpDesk) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Help Desk</h5>
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
                            <div class="col-md-9">
                                <input name="surname" class="form-control" type="text" placeholder="Введите фамилию" value="{{ $helpDesk->surname }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Имя:</label>
                            <div class="col-md-9">
                                <input name="name" class="form-control" type="text" placeholder="Введите имя" value="{{ $helpDesk->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Email:</label>
                            <div class="col-md-9">
                                <input name="email" class="form-control" type="text" placeholder="Введите почту" value="{{ $helpDesk->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Телефон:</label>
                            <div class="col-md-9">
                                <input name="phone" class="form-control" type="text" placeholder="Введите номер телефона" value="{{ $helpDesk->phone }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Сообщение:</label>
                            <div class="col-md-9">
                                <textarea rows="5" name="message" class="form-control">{{ $helpDesk->message }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Статус:</label>
                            <div class="col-md-9">
                                <select name="status" class="select2">
                                    @foreach (\App\Classes\HelpDeskStatusEnum::lists() as $status)
                                        <option
                                                @if ($status == $helpDesk->status) selected @endif
                                                value="{{ $status }}"
                                        >{{ \App\Classes\HelpDeskStatusEnum::$labels[$status] }}</option>
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