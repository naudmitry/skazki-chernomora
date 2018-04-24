<div class="toggle-flip">
    <label>
        <input
                class="checkbox"
                data-href="#"
                type="checkbox"
                @{{#application.is_process_personal_data}} checked @{{/application.is_process_personal_data}}
        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
    </label>
</div>