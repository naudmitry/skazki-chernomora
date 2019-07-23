<div class="tile" id="widget-panel">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal widget-settings-form" id="form-widget-panel" action="{{ route('widget.save', $widget) }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="title">Заголовок:</label>
                <div class="col-md-8">
                    <input
                            id="title"
                            name="title"
                            data-setting="title"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="title_color">Цвет текста заголовка:</label>
                <div class="col-md-8">
                    <input
                            id="title_color"
                            name="title_color"
                            data-setting="title_color"
                            class="form-control widget-setting"
                            type="color"
                            value="{{ $widget_setting->title_color ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="subtitle">Подзаголовок:</label>
                <div class="col-md-8">
                    <input
                            id="subtitle"
                            name="subtitle"
                            data-setting="subtitle"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->subtitle ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="subtitle_color">Цвет текста подзаголовка:</label>
                <div class="col-md-8">
                    <input
                            id="subtitle_color"
                            name="subtitle_color"
                            data-setting="subtitle_color"
                            class="form-control widget-setting"
                            type="color"
                            value="{{ $widget_setting->subtitle_color ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="image_link">Ссылка на картинку (1920x1280):</label>
                <div class="col-md-8">
                    <input
                            id="image_link"
                            name="image_link"
                            data-setting="image_link"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->image_link ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="is_breadcrumbs">Навигационная цепочка:</label>
                <div class="col-md-8">
                    <div class="toggle-flip">
                        <label class="mb-0">
                            <input
                                    id="is_breadcrumbs"
                                    data-setting="is_breadcrumbs"
                                    @if ($widget_setting->is_breadcrumbs) checked @endif
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