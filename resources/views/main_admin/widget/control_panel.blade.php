<div class="tile">
    <h4 class="line-head">Виджеты</h4>

    <div class="blog-categories-list" id="container">
        <select>
            @foreach($allContainerWidgets as $widgetItem)
                <option value="{{ $widgetItem['class_name'] }}">{{ $widgetItem['class_name'] }}</option>
            @endforeach
        </select>

        <div class="input-group-btn">
            <button
                    id="add-block-widget"
                    type="button"
                    class="btn btn-primary"
                    data-container-id="{{ $widgetContainer->id }}"
            >Добавить</button>
        </div>
    </div>
</div>