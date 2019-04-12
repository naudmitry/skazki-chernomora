<div class="col-lg-6 modal" id="salt-cave-modal">
    <div class="bs-component">
        <div class="modal" style="position: relative; top: auto; right: auto; left: auto; bottom: auto; z-index: 1; display: block;">
            <div class="modal-dialog" role="document">
                <form
                        autocomplete="off"
                        class="modal-content salt-cave-create-form"
                        method="post"
                        action="{{ route('admin.salt-cave.save', $saltCave) }}">

                    <div class="modal-header">
                        <h5 class="modal-title">Соляная пещера</h5>
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
                                <input name="title" class="form-control" type="text" placeholder="Введите наименование" value="{{ $saltCave->title ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Адрес:</label>
                            <div class="col-md-7">
                                <input name="address" class="form-control" type="text" placeholder="Введите адрес" value="{{ $saltCave->address ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Доступность:</label>
                            <div class="col-md-7">
                                <div class="toggle-flip">
                                    <label>
                                        <input
                                                name="is_enabled"
                                                class="checkbox"
                                                type="checkbox"
                                                value="1"
                                                @if ($saltCave->is_enabled) checked @endif
                                        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Номера телефонов:</label>
                            <div class="col-md-7">
                                <select class="form-control select2" multiple name="phone_numbers[]">
                                    @if (!empty($saltCave->phone_numbers))
                                        @foreach ($saltCave->phone_numbers as $phoneNumber)
                                            <option selected value="{{ $phoneNumber }}">{{ $phoneNumber }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-4">Рабочее время:</label>
                            <div class="col-md-7">
                                <select class="form-control select2" multiple name="working_time[]">
                                    @if (!empty($saltCave->working_time))
                                        @foreach ($saltCave->working_time as $workingTime)
                                            <option selected value="{{ $workingTime }}">{{ $workingTime }}</option>
                                        @endforeach
                                    @endif
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