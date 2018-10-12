<div class="toggle-flip" style="text-align: center">
    <label>
        <input
                class="checkbox"
                data-href="{{ route('admin.faq.question.enable', '') }}/@{{faq.id}}"
                type="checkbox"
                @{{#faq.enable}} checked @{{/faq.enable}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>
