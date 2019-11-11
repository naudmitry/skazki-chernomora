<div class="widgets-list-item list-items-container" id="{{ $widget->id }}">
    <div class="toggle-flip title-center">
        <div class="toggle">
            <label class="mb-0">
                <input
                        class="checkbox widget-enable"
                        type="checkbox"
                        @if ($widget->action) checked @endif
                        data-href="{{ route('widget.enable', $widget) }}"
                ><span class="button-indecator"></span>
            </label>
        </div>

        <p class="title dragula-handle mb-0">
            <a
                class="widget-settings-open"
                href="{{ route('widget.settings', $widget) }}"
            >{{ trans('widgets.' . $widget->class_name . '.title') }}</a>
        </p>
    </div>

    <div class="toggle-flip title-center">
        <a class="dragula-handle mr-2" href="#">
            <i class="fas {{ $dragging ? 'fa-arrows-alt' : 'fa-ban' }} dragula-handle"></i>
        </a>
        <a class="widget-destroy" href="{{ route('widget.destroy', $widget) }}">
            <i class="fas fa-trash-alt mr-2"></i>
        </a>
    </div>
</div>