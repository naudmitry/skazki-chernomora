<div class="toggle-flip">
    <label>
        <input
                class="checkbox showcase-enable-checkbox"
                data-href="{{ route('admin.showcase.enable', '') }}/@{{showcase.slug}}"
                type="checkbox"
                @{{#showcase.enable}} checked @{{/showcase.enable}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>

