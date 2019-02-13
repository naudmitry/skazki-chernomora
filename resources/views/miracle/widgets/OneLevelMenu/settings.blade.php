<div class="tile" id="widget-panel">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal widget-settings-form" id="form-widget-panel" action="{{ route('widget.save', $widget) }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="title">Название ссылки:</label>
                <div class="col-md-8">
                    <input
                            id="title"
                            name="title"
                            data-setting="title"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->title }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="link">Адрес ссылки:</label>
                <div class="input-group col-md-8">
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{ $showcase->getDomainPath() }}</span>
                    </div>
                    <input
                            id="link"
                            name="link"
                            data-setting="link"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->link }}">
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
                <button class="btn btn-default save-settings" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>