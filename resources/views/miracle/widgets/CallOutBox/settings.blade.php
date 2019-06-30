<div class="tile" id="widget-panel">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal widget-settings-form" id="form-widget-panel" action="{{ route('widget.save', $widget) }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="title">Название:</label>
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
                    <input
                            id="link"
                            name="link"
                            data-setting="link"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->link }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="button">Надпись на кнопке:</label>
                <div class="col-md-8">
                    <input
                            id="button"
                            name="button"
                            data-setting="button"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->button }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="is_button_show">Показывать кнопку:</label>
                <div class="col-md-8">
                    <div class="toggle-flip">
                        <label class="mb-0">
                            <input
                                    id="is_button_show"
                                    data-setting="is_button_show"
                                    @if ($widget_setting->is_button_show) checked @endif
                                    type="checkbox"
                                    class="widget-setting checkbox entity-availability"
                            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                        </label>
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