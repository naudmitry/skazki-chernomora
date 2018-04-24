<div class="toggle-flip">
    <label>
        <input
                class="checkbox company-enable-checkbox"
                data-href="{{ route('admin.company.enable', '') }}/@{{company.slug}}"
                type="checkbox"
                @{{#company.enable}} checked @{{/company.enable}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>
