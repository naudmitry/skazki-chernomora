<div class="tab-pane active" id="user-settings">
    <div class="tile user-settings">
        <h4 class="line-head">Настройки</h4>
        <form>
            <div class="row mb-4">
                <div class="col-md-4">
                    <label>Фамилия:</label>
                    <input class="form-control" type="text" name="surname" value="{{ $admin->surname }}">
                </div>
                <div class="col-md-4">
                    <label>Имя:</label>
                    <input class="form-control" type="text" name="name" value="{{ $admin->name }}">
                </div>
                <div class="col-md-4">
                    <label>Отчество:</label>
                    <input class="form-control" type="text" name="middle_name" value="{{ $admin->middle_name }}">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <label>Email:</label>
                    <input class="form-control" type="email" name="email" value="{{ $admin->email }}">
                </div>
                <div class="col-md-4">
                    <label>Номер мобильного телефона:</label>
                    <input class="form-control" type="text" name="phone" value="{{ $admin->phone }}">
                </div>
                <div class="col-md-4">
                    <label class="control-label" for="birthday_at">Дата рождения:</label>
                    <input name="birthday_at" class="form-control" type="text" value="{{ $admin->birthday_at ? $admin->birthday_at->format('d.m.Y') : '' }}">
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