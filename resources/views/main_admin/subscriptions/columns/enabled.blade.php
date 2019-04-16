<div class="toggle-flip">
    <label>
        <input
                class="checkbox subscription-enabled"
                data-href="{{ route('admin.subscription.enable', '') }}/@{{subscription.id}}"
                type="checkbox"
                @{{#subscription.is_enabled}} checked @{{/subscription.is_enabled}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>