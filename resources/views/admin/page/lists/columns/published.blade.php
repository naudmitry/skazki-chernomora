<div class="toggle-flip" style="text-align: center">
    <label>
        <input
                class="checkbox"
                data-href="{{ route('admin.page.list.enable', '') }}/@{{page.id}}"
                type="checkbox"
                @{{#page.enable}} checked @{{/page.enable}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>
