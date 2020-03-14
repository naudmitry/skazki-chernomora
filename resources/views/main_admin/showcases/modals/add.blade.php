<div class="col-lg-6 modal" id="modal-add-showcase">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form class="modal-content showcase-add-form" method="post" action="{{ route('admin.showcase.create') }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Добавление сайта</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Наименование:</label>
                            <div class="col-md-8">
                                <input name="title" class="form-control" type="text" placeholder="Введите наименование">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Веб-адрес:</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">http://</span></div>
                                    <input name="domain" class="form-control" type="text" placeholder="Введите домен">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>