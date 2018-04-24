<div class="toggle-flip">
    <label>
        <input
                class="checkbox"
                data-href="{{ route('admin.page.list.enable', '@pageId') }}"
                type="checkbox"
                @{{#page.enable}} checked @{{/page.enable}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>
