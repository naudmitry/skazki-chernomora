<div class="toggle-flip">
    <label>
        <input
                class="checkbox item-enable"
                data-href="{{ route('admin.privileges.enable', '@privilegeId') }}"
                type="checkbox"
                @{{#privilege.is_enabled}} checked @{{/privilege.is_enabled}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>