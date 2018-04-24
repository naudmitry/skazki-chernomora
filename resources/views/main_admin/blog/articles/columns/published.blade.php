<div class="toggle-flip">
    <label>
        <input
                class="checkbox"
                data-href="{{ route('admin.blog.articles.enable', '@blogId') }}"
                type="checkbox"
                @{{#blog.enable}} checked @{{/blog.enable}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>
