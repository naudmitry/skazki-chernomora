<div class="toggle-flip">
    <label>
        <input
                class="checkbox item-enable"
                data-href="{{ route('admin.salt-caves.enable', '@caveId') }}"
                type="checkbox"
                @{{#cave.is_enabled}} checked @{{/cave.is_enabled}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>
