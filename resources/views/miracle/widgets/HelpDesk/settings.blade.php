<div class="tile" data-widget-id="{{ $widget->id }}" id="widget-panel">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal widget-settings-form" id="form-widget-panel" action="{{ route('widget.save', $widget) }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="title">Заголовок:</label>
                <div class="col-md-8">
                    <input
                            id="title"
                            data-setting="title"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->title }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="subtitle">Подзаголовок:</label>
                <div class="col-md-8">
                    <input
                            id="subtitle"
                            data-setting="subtitle"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->subtitle }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="textarea-0">Текст подтверждения:</label>
                <div class="col-md-8 content-group">
                    <textarea
                            id="textarea-0"
                            data-field-type="textarea-editor"
                            data-setting="text"
                            class="widget-setting required"
                            required
                    >{{ $widget_setting->text ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="padding">Отступы:</label>
                <div class="col-md-8">
                    <input
                            id="padding"
                            name="padding"
                            data-setting="padding"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->padding ?? '' }}">
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