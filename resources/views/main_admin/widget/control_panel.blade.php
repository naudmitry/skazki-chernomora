<div class="tile">
    <h4 class="line-head">Виджеты</h4>

    <div class="tile-body">
        <div class="form-group row blog-categories-list" id="container">
            <select class="select2">
                @foreach($allContainerWidgets as $widgetItem)
                    <option value="{{ $widgetItem['class_name'] }}">{{ $widgetItem['class_name'] }}</option>
                @endforeach
            </select>

            <div class="input-group-btn">
                <button
                        id="add-block-widget"
                        type="button"
                        class="btn btn-primary ml-2"
                        data-container-id="{{ $widgetContainer->id }}"
                >Добавить</button>
            </div>
        </div>
    </div>
</div>