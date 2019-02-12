<div class="widgets-list-item list-items-container" id="{{ $widget->id }}">
    <div class="toggle-flip title-center">
        <label class="checkbox-left">
            <input
                    class="checkbox widget-enable"
                    type="checkbox"
                    @if ($widget->action) checked @endif
                    data-href="{{ route('widget.enable', $widget) }}"
            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
        </label>

        <p class="title dragula-handle" style="margin-bottom: 0;">{{ $widget->class_name }}</p>
    </div>

    <div class="btn-group">
        <a class="btn btn-primary dragula-handle" href="#">
            <i class="fas fa-arrows-alt dragula-handle" style="vertical-align: middle;"></i>
        </a>

        <a
            class="btn btn-primary widget-settings-open"
            href="{{ route('widget.settings', $widget) }}"
        ><i class="fas fa-edit"></i></a>

        <a
            class="btn btn-primary widget-destroy"
            href="{{ route('widget.destroy', $widget) }}"
        ><i class="fas fa-trash"></i></a>
    </div>
</div>