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
                            name="title"
                            data-setting="title"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="is_header_show">Показывать заголовок:</label>
                <div class="col-md-8">
                    <div class="toggle-flip">
                        <label class="mb-0">
                            <input
                                    id="is_header_show"
                                    data-setting="is_header_show"
                                    @if ($widget_setting->is_header_show) checked @endif
                                    type="checkbox"
                                    class="widget-setting checkbox entity-availability"
                            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div id="accordionExample" class="accordion">
                @foreach(data_get($widget_setting, 'items', []) as $setting)
                    @include('miracle.widgets.MetroGallery1.block', ['position' => $loop->iteration])
                @endforeach
            </div>

            <div class="tile-footer">
                <button class="btn btn-primary" type="button" href="{{ route('widget.addBlock', $widget) }}" id="add_block">
                    <i class="fas fa-plus-circle mr-2"></i>Добавить
                </button>
                <button class="btn btn-default save-settings" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>