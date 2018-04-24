<div class="mobile-nav-wrapper collapse visible-mobile" id="mobile-nav-wrapper">
    <ul class="mobile-nav">
        @foreach(array_get($widgets_top, 'middle', []) as $widget)
            @widget('miracle.' . $widget->class_name, ['widget' => $widget])
        @endforeach
    </ul>
</div>