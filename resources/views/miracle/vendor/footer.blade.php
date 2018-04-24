<footer id="footer" class="{{ $currentShowcase->config('styles:footer') }}">
    @foreach(array_get($widgets_bottom, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach

    <div class="footer-wrapper">
        <div class="container">
            <div class="row add-clearfix same-height">
                @foreach(array_get($widgets_bottom, 'middle', []) as $widget)
                    @widget('miracle.' . $widget->class_name, ['widget' => $widget])
                @endforeach
            </div>
        </div>
    </div>

    @foreach(array_get($widgets_bottom, 'bottom', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
</footer>