<div class="tile">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal" action="#" method="post">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4">Название ссылки:</label>
                <div class="col-md-8">
                    <input id="title" name="title" class="form-control" type="text" value="">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Адрес ссылки:</label>
                <div class="input-group col-md-8">
                    <input id="address" name="address" class="form-control" type="text" value="">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <a href="#" target="_blank">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </span>
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