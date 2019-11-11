<div class="tile" data-widget-id="{{ $widget->id }}" id="widget-panel">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal widget-settings-form" id="form-widget-panel" action="{{ route('widget.save', $widget) }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="map_link">Ссылка на карту:</label>
                <div class="col-md-8">
                    <input
                            id="map_link"
                            name="map_link"
                            data-setting="map_link"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->map_link }}">
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