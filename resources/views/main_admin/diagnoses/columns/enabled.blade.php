<div class="toggle-flip">
    <label>
        <input
                class="checkbox diagnosis-enabled"
                data-href="{{ route('admin.diagnosis.list.enable', '') }}/@{{diagnosis.id}}"
                type="checkbox"
                @{{#diagnosis.is_enabled}} checked @{{/diagnosis.is_enabled}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>