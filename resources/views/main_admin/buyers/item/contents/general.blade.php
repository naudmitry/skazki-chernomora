<div class="tile">
    <h4 class="line-head">Основная информация</h4>

    <form autocomplete="off" class="buyer-general-form" method="{{ $buyer->id ? 'patch' : 'post' }}"
          action="{{ $buyer->id ? route('admin.buyers.update', [$buyer, 'tab' => 'general']) : route('admin.buyers.store') }}">
        {{ csrf_field() }}

        <div class="row">
            <div class="column col-md-6">
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
                        <label class="control-label" for="admin_id">Администратор:</label>
                    </div>
                    <div class="col-md-8">
                        <select name="admin_id" class="select2">
                            @foreach ($admins as $admin)
                                <option
                                        @if ($buyer->admin_id == $admin->id) selected @endif
                                value="{{ $admin->id }}"
                                >{{ $admin->full_name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="surname">Фамилия:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="surname" name="surname" class="form-control" type="text"
                               value="{{ $buyer->surname ?? '' }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="name">Имя:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="name" name="name" class="form-control" type="text" value="{{ $buyer->name ?? '' }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="middle_name">Отчество:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="middle_name" name="middle_name" class="form-control" type="text"
                               value="{{ $buyer->middle_name ?? '' }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="privilege_id">Льгота:</label>
                    </div>
                    <div class="col-md-8">
                        <select name="privilege_id" class="select2">
                            <option value="">Нет льготы</option>
                            @foreach ($privileges as $privilege)
                                <option
                                        @if ($buyer->privilege_id == $privilege->id) selected @endif
                                value="{{ $privilege->id }}"
                                >{{ $privilege->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="column col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="contract_at">Пол:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="select2" name="gender">
                            @foreach (\App\Classes\GenderEnum::lists() as $gender)
                                <option
                                        @if ($buyer->gender == $gender) selected @endif
                                value="{{ $gender }}"
                                >{{ trans('gender.' . $gender) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="contract_at">Тип абонемента:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="select2" name="type_subscription">
                            @foreach (\App\Classes\BuyerTypeSubscriptionEnum::lists() as $type)
                                <option
                                        @if ($buyer->type_subscription == $type) selected @endif
                                value="{{ $type }}"
                                >{{ \App\Classes\BuyerTypeSubscriptionEnum::$labels[$type] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="number_contract">Номер договора:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="number_contract" name="number_contract" class="form-control" type="text"
                               value="{{ $buyer->number_contract ?? '' }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="contract_at">Дата договора:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="contract_at" name="contract_at" class="form-control" type="text"
                               value="{{ $buyer->contract_at ? $buyer->contract_at->format('d.m.Y') : '' }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="organization_id">Организация:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="select2" name="organization_id">
                            <option value="">Нет организации</option>
                            @foreach ($organizations as $organization)
                                <option
                                        @if ($buyer->organization_id == $organization->id) selected @endif
                                value="{{ $organization->id }}"
                                >{{ $organization->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="line-head mt-4">Паспортные данные</h4>

        <div class="row">
            <div class="column col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="passport">Номер паспорта:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="passport" name="passport" class="form-control" type="text"
                               value="{{ $buyer->passport ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="column col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="passport_issuing_at">Дата выдачи:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="passport_issuing_at" name="passport_issuing_at" class="form-control" type="text"
                               value="{{ $buyer->passport_issuing_at ? $buyer->passport_issuing_at->format('d.m.Y') : '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <label class="control-label" for="passport_issued_by">Кем выдан:</label>
            </div>
            <div class="col-md-10">
                <input id="passport_issued_by" name="passport_issued_by" class="form-control" type="text"
                       value="{{ $buyer->passport_issued_by ?? '' }}">
            </div>
        </div>

        <h4 class="line-head mt-4">Дополнительная информация</h4>

        <div class="row">
            <div class="column col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="email">Email:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="email" name="email" class="form-control" type="email"
                               value="{{ $buyer->email ?? '' }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="phone_number">Номер телефона:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="phone_number" name="phone_number" class="form-control" type="tel"
                               value="{{ $buyer->phone_number ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="column col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="address">Адрес:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="address" name="address" class="form-control" type="text"
                               value="{{ $buyer->address ?? '' }}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label" for="birthday_at">Дата рождения:</label>
                    </div>
                    <div class="col-md-8">
                        <input id="birthday_at" name="birthday_at" class="form-control" type="text"
                               value="{{ $buyer->birthday_at ? $buyer->birthday_at->format('d.m.Y') : '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <label class="control-label" for="ad_source">Источник рекламы:</label>
            </div>
            <div class="col-md-10">
                <select id="ad_source" multiple class="select2" name="ad_source_ids[]">
                    @foreach ($adSources as $adSource)
                        <option
                                value="{{ $adSource->id }}"
                                {{--TODO: remove request--}}
                                @if ($buyer->adSources->whereIn('id', $adSource->id)->count()) selected @endif
                        >{{ $adSource->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <h4 class="line-head mt-4">Медицинские сведения</h4>

        <div class="form-group row">
            <div class="col-md-2">
                <label class="control-label" for="diagnosis">Диагнозы:</label>
            </div>
            <div class="col-md-10">
                <select id="diagnosis" multiple class="select2" name="diagnosis_ids[]">
                    @foreach ($diagnoses as $diagnosis)
                        <option
                                value="{{ $diagnosis->id }}"
                                {{--TODO: remove request--}}
                                @if ($buyer->diagnoses->whereIn('id', $diagnosis->id)->count()) selected @endif
                        >{{ $diagnosis->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <label class="control-label" for="complaint">Жалобы:</label>
            </div>
            <div class="col-md-10">
                <select id="complaint" multiple class="select2" name="complaint_ids[]">
                    @foreach ($complaints as $complaint)
                        <option
                                value="{{ $complaint->id }}"
                                {{--TODO: remove request--}}
                                @if ($buyer->complaints->whereIn('id', $complaint->id)->count()) selected @endif
                        >{{ $complaint->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
                <label class="control-label" for="dynamics">Заметки:</label>
            </div>
            <div class="col-md-10">
                <textarea id="dynamics" name="dynamics" rows="4" cols="5"
                          class="form-control">{{ $buyer->dynamics ?? '' }}</textarea>
            </div>
        </div>

        <div class="tile-footer">
            <button class="btn btn-default" type="submit" disabled>
                <i class="fas fa-check-circle mr-2"></i>Сохранить
            </button>
        </div>
    </form>
</div>