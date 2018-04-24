<div class="tab-pane active" id="general">
    <div class="tile">
        <h4 class="line-head">Основные</h4>

        <form autocomplete="off" class="settings-general-form" method="post" action="{{ route('admin.settings.update', 'general') }}">
            <div class="form-group row">
                <div class="col-md-3">
                    <label class="control-label" for="display-site-name">Наименование сайта:</label>
                </div>
                <div class="col-md-9">
                    <input
                            id="display-site-name"
                            name="general:display-site-name"
                            class="form-control"
                            type="text"
                            value="{{ $administeredShowcase->config('general:display-site-name') }}">
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