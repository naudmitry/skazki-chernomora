<div class="tile" id="widget-panel">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal widget-settings-form" id="form-widget-panel" action="{{ route('widget.save', $widget) }}">
            {{ csrf_field() }}

            <div id="accordionExample" class="accordion">
                @foreach(data_get($widget_setting, 'items', []) as $setting)
                    @include('miracle.widgets.Slider.block', ['position' => $loop->iteration])
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