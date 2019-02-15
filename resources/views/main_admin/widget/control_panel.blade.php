<div class="tile widgets-panel" data-role="widgets-control-panel">
    <h4 class="line-head">Виджеты</h4>

    <div class="tile-body">
        <div class="form-group row">
            <div class="col-md-12">
                <select class="form-control select2 select-add-block">
                    @foreach($allContainerWidgets as $widgetItem)
                        <option value="{{ $widgetItem['class_name'] }}">{{ $widgetItem['class_name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="media-list media-list-container" id="media-list-target-top">
            @foreach(array_get($activeWidgets, 'top', []) as $widget)
                @include('main_admin.widget.item', ['widget' => $widget, 'dragging' => false])
            @endforeach
        </div>

        <div class="media-list media-list-container" id="media-list-target-middle">
            @foreach(array_get($activeWidgets, 'middle', []) as $widget)
                @include('main_admin.widget.item', ['widget' => $widget, 'dragging' => true])
            @endforeach
        </div>

        <div class="tile-footer">
            <button
                    id="add-block-widget"
                    type="button"
                    class="btn btn-primary create-widget"
                    href="{{ route('widget.create') }}"
                    data-container-id="{{ $widgetContainer->id }}"
            ><i class="fas fa-plus-circle mr-2" aria-hidden="true"></i>Добавить</button>
        </div>
    </div>
</div>

<script type="text/template" class="loading-template">
    @include('main_admin.includes.loading')
</script>

<script type="application/json" class="add-widgets-panel-config">
    {!! json_encode(
        [
            'sequenceWidgetUrl' => route('widget.sequence'),
        ])
     !!}
</script>