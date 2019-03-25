<div class="tab-pane active" id="general">
    <div class="tile">
        <h4 class="line-head">Карточка клиента</h4>

        <form autocomplete="off" class="buyer-general-form" method="post" action="{{ route('admin.buyer.list.save', [$buyer, 'general']) }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="column col-md-6">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="surname">Фамилия:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="surname"
                                    name="surname"
                                    class="form-control"
                                    type="text"
                                    value="{{ $buyer->surname }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="name">Имя:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="name"
                                    name="name"
                                    class="form-control"
                                    type="text"
                                    value="{{ $buyer->name }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="middle_name">Отчество:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="middle_name"
                                    name="middle_name"
                                    class="form-control"
                                    type="text"
                                    value="{{ $buyer->middle_name }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="birthday_at">Дата рождения:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="birthday_at"
                                    name="birthday_at"
                                    class="form-control"
                                    type="text"
                                    value="{{ $buyer->birthday_at }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="is_enabled">Активен:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="toggle-flip">
                                <label class="checkbox-left">
                                    <input
                                            class="checkbox"
                                            type="checkbox"
                                            name="is_enabled"
                                            value="1"
                                            @if ($buyer->is_enabled) checked @endif
                                    ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="is_enabled">Обработка данных:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="toggle-flip">
                                <label class="checkbox-left">
                                    <input
                                            class="checkbox"
                                            type="checkbox"
                                            name="is_processing_personal_data"
                                            value="1"
                                            @if ($buyer->is_processing_personal_data) checked @endif
                                    ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column col-md-6">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="address">Адрес:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="address"
                                    name="address"
                                    class="form-control"
                                    type="text"
                                    value="{{ $buyer->address }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="email">Email:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    type="email"
                                    value="{{ $buyer->email }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="phone_number">Номер телефона:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="phone_number"
                                    name="phone_number"
                                    class="form-control"
                                    type="text"
                                    value="{{ $buyer->phone_number }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="number_contract">Номер договора:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="number_contract"
                                    name="number_contract"
                                    class="form-control"
                                    type="text"
                                    value="{{ $buyer->number_contract }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label" for="contract_at">Дата договора:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    id="contract_at"
                                    name="contract_at"
                                    class="form-control"
                                    type="text"
                                    value="{{ $buyer->contract_at }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>