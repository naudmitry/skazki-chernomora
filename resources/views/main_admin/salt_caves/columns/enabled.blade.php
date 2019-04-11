<div class="toggle-flip">
    <label>
        <input
                class="checkbox salt-cave-enabled"
                data-href="{{ route('admin.salt-cave.enabled', '') }}/@{{cave.id}}"
                type="checkbox"
                @{{#cave.is_enabled}} checked @{{/cave.is_enabled}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>
