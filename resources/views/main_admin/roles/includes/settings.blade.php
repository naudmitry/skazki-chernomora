<div class="tile admin-role-settings-container" data-admin-role-id="{{ $role->id ?? '' }}">
    <h4 class="line-head">Настройки</h4>

    <form class="admin-role-settings-form" method="post" action="{{ route('admin.role.save', $role) }}">
        <div class="form-group row">
            <div class="col-md-3">
                <label class="control-label">Название:</label>
            </div>
            <div class="col-md-9 toggle-flip">
                <input name="title" class="form-control" type="text" value="{{ $role->title ?? '' }}">
            </div>
        </div>

        <div id="accordionExample" class="accordion">
            @foreach ($groupsComponentsBySuper[$administeredCompany->super] as $group => $components)
                @if (count($components))
                    <div class="card">
                        <div class="card-header" id="heading-{{ $loop->iteration }}">
                            <h5 class="mb-0">
                                <button
                                        class="btn btn-link"
                                        type="button"
                                        data-toggle="collapse"
                                        data-target="#collapse-{{ $loop->iteration }}"
                                        aria-expanded="false"
                                        aria-controls="collapse-{{ $loop->iteration }}"
                                >{{ trans('roles.groups.' . $group) }}</button>
                            </h5>
                        </div>

                        <div id="collapse-{{ $loop->iteration }}" class="collapse" aria-labelledby="heading-{{ $loop->iteration }}" data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($components as $component)
                                    @if (in_array($component, $administeredCompany->super ? \App\Classes\AdminComponentEnum::listsSuper() : \App\Classes\AdminComponentEnum::listsCompany()))
                                        <div class="list-items-container">
                                            <div class="toggle-flip title-center">
                                                <label class="checkbox-left">
                                                    <input
                                                            class="checkbox"
                                                            type="checkbox"
                                                            name="components[]"
                                                            value="{{ $component }}"
                                                            @if (isset($role) && $role->enable) disabled @endif
                                                            @if (isset($role->id) && in_array($component, $role->components)) checked @endif
                                                    ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                                                </label>

                                                <p class="title dragula-handle" style="margin-bottom: 0;">{{ trans('roles.' . $component) }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="tile-footer">
            <button class="btn btn-default" disabled type="submit">
                <i class="fas fa-check-circle mr-2" aria-hidden="true"></i>Сохранить
            </button>
        </div>
    </form>
</div>
