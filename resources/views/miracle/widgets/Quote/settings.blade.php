<div class="tile" id="widget-panel">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal widget-settings-form" id="form-widget-panel" action="{{ route('widget.save', $widget) }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="content">Текст:</label>
                <div class="col-md-8">
                    <input
                            id="content"
                            data-setting="content"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->content ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="signature">Подпись:</label>
                <div class="col-md-8">
                    <input
                            id="signature"
                            data-setting="signature"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->signature ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="style">Стиль:</label>
                <div class="col-md-8">
                    <select
                            data-setting="style"
                            class="form-control select2 widget-setting"
                    >@include('miracle.widgets.Quote.select_styles', ['style' => $widget_setting->style ?? ''])</select>
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