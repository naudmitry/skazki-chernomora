<div class="tile staff-group-settings-container" data-group-id="{{ $group->id ?? '' }}">
    <h4 class="line-head">Настройки группы</h4>

    <div class="tile-body">
        <form class="form-horizontal staff-group-settings-form" action="{{ route('admin.staff.group.save', $group) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4">Название:</label>
                <div class="col-md-8">
                    <input id="title" name="title" class="form-control" type="text" value="{{ $group->title ?? '' }}">
                </div>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
