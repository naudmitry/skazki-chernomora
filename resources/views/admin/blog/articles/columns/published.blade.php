<div class="toggle-flip" style="text-align: center">
    <label>
        <input
                class="checkbox"
                data-href="{{ route('admin.blog.change.availability', '') }}/@{{blog.id}}"
                type="checkbox"
                @{{#blog.enable}} checked @{{/blog.enable}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>
