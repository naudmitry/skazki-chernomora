<div class="toggle-flip">
    <label>
        <input
                class="checkbox subscription-enabled"
                data-href="{{ route('admin.subscriptions.enable', '@subscriptionId') }}"
                type="checkbox"
                @{{#subscription.is_enabled}} checked @{{/subscription.is_enabled}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>