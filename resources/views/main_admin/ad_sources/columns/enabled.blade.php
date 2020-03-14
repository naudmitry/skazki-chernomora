<div class="toggle-flip">
    <label>
        <input
                class="checkbox ad-source-enabled"
                data-href="{{ route('admin.ad-sources.enable', '@sourceId') }}"
                type="checkbox"
                @{{#source.is_enabled}} checked @{{/source.is_enabled}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>