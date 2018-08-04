<div class="tab-pane fade contacts-tab" id="user-settings">
    <div class="tile user-settings">
        <h4 class="line-head">Контакты</h4>

        <form>
            <div class="form-group">
                <label class="control-label">Почтовый индекс:</label>
                <input class="form-control" type="text" placeholder="Введите почтовый индекс">
            </div>

            <div class="form-group">
                <label class="control-label">Страна:</label>
                <input class="form-control" type="text" placeholder="Введите страну">
            </div>

            <div class="form-group">
                <label class="control-label">Область:</label>
                <input class="form-control" type="text" placeholder="Введите область">
            </div>

            <div class="form-group">
                <label class="control-label">Город:</label>
                <input class="form-control" type="text" placeholder="Введите город">
            </div>

            <div class="address-container">
                <div class="row">
                    <div class="form-group col-md-10">
                        <label class="control-label">Адрес <span class="address-number"></span>:</label>
                        <input class="form-control" type="text" placeholder="Введите адрес">
                    </div>

                    <div class="form-group col-md-2 align-self-end">
                        <button class="btn btn-danger" type="button">
                            <i class="fa fa-lg fa-trash" style="margin-right: 0px"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <button class="btn btn-primary contacts-address-add" type="button">Добавить</button>
                </div>
            </div>

            <div class="phone-container">
                <div class="row">
                    <div class="form-group col-md-10">
                        <label class="control-label">Телефон <span class="phone-number"></span>:</label>
                        <input class="form-control" type="text" placeholder="Введите телефон">
                    </div>

                    <div class="form-group col-md-2 align-self-end">
                        <button class="btn btn-danger" type="button">
                            <i class="fa fa-lg fa-trash" style="margin-right: 0px"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <button class="btn btn-primary contacts-phone-add" type="button">Добавить</button>
                </div>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Сохранить
                </button>
            </div>
        </form>

        <script type="text/template" class="template-contacts-address-item">
                        @include('admin.settings.contacts.includes.address')
        </script>

        <script type="text/template" class="template-contacts-phone-item">
                        @include('admin.settings.contacts.includes.phone')
        </script>
    </div>
</div>
