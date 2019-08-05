<div class="col-lg-6 modal" id="modal-staff">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form
                        autocomplete="off"
                        class="modal-content admin-list-edit-form"
                        method="post"
                        @if (isset($admin->id))
                            action="{{ route('admin.staff.list.save', $admin) }}"
                        @else
                            action="{{ route('admin.staff.list.create') }}"
                        @endif
                >
                    <div class="modal-header">
                        <h5 class="modal-title">Администратор</h5>
                        <button
                                class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                        ><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Имя:</label>
                            <div class="col-md-8">
                                <input name="name" class="form-control" type="text" placeholder="Введите имя" value="{{ $admin->name ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Фамилия:</label>
                            <div class="col-md-8">
                                <input name="surname" class="form-control" type="text" placeholder="Введите фамилию" value="{{ $admin->surname ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Должность:</label>
                            <div class="col-md-8">
                                <input name="position" class="form-control" type="text" placeholder="Введите должность" value="{{ $admin->position ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Телефон:</label>
                            <div class="col-md-8">
                                <input name="phone" class="form-control" type="text" placeholder="Введите номер телефона" value="{{ $admin->phone ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Email:</label>
                            <div class="col-md-8">
                                <input name="email" class="form-control" type="email" placeholder="Введите email" value="{{ $admin->email ?? '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3" for="role">Роль:</label>
                            <div class="col-md-8">
                                <select id="role" class="select2" name="role_id">
                                    @foreach ($administeredCompany->roles as $role)
                                        <option
                                                value="{{ $role->id }}"
                                                @if ($admin->role_id == $role->id) selected @endif
                                        >{{ $role->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3" for="showcases">Сайты:</label>
                            <div class="col-md-8">
                                <select id="showcases" class="select2" multiple name="showcases[]">
                                    <option value="all">Все</option>
                                    @foreach ($administeredCompany->showcases as $showcase)
                                        <option
                                                @if (array_search($showcase->id, array_column($adminShowcases, 'id')) !== false) selected @endif
                                                value="{{ $showcase->id }}"
                                        >{{ $showcase->domain }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3" for="groups">Группы:</label>
                            <div class="col-md-8">
                                <select id="groups" class="select2" multiple name="groups[]">
                                    @foreach ($administeredCompany->groups as $group)
                                        <option
                                                @if (array_search($group->id, array_column($adminGroups, 'id')) !== false) selected @endif
                                                value="{{ $group->id }}"
                                        >{{ $group->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if ($company->super)
                            <div class="form-group row">
                                <label class="control-label col-md-3" for="companies">Компании:</label>
                                <div class="col-md-8">
                                    <select id="companies" class="select2" multiple name="companies[]">
                                        <option value="all">Все</option>
                                        @foreach ($companies as $company)
                                            <option
                                                    value="{{ $company->id }}"
                                                    @if (array_search($company->id, array_column($adminCompanies, 'id')) !== false) selected @endif
                                            >{{ $company->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
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