<div class="toggle-flip">
    <label>
        <input
                class="checkbox review-widgeted"
                data-href="{{ route('admin.review.widgeted', '') }}/@{{review.id}}"
                type="checkbox"
                @{{#review.is_widget}} checked @{{/review.is_widget}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>