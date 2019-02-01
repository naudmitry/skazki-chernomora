<div class="tile" data-role="widgets-control-panel">
    <h4 class="line-head">Виджеты</h4>

    <div class="tile-body">
        <div class="form-group row blog-categories-list">
            <div class="btn-group col-md-12">
                <select class="form-control select2 select-add-block">
                    @foreach($allContainerWidgets as $widgetItem)
                        <option value="{{ $widgetItem['class_name'] }}">{{ $widgetItem['class_name'] }}</option>
                    @endforeach
                </select>
                <button
                        id="add-block-widget"
                        type="button"
                        class="btn btn-primary"
                        data-container-id="{{ $widgetContainer->id }}"
                >Добавить</button>
            </div>
        </div>

        <div class="media-list media-list-container" id="container">
            @foreach(array_get($activeWidgets, 'middle', []) as $widget)
                @include('main_admin.widget.add_widget', ['widget' => $widget, 'dragging' => true])
            @endforeach
        </div>
    </div>
</div>

<script type="application/json" class="add-widgets-panel-config">
    {!! json_encode(
        [
            'notificationOpenWidgetSetting' =>
            [
                'mainTitle' => 'mainTitle',
                'mainSubTitle' => 'mainSubTitle',
                'mainYesBtn' => 'mainYesBtn',
                'mainNoBtn' => 'mainNoBtn',
                'yesTitle' => 'yesTitle',
                'yesSubTitle' => 'yesSubTitle',
                'noTitle' => 'noTitle',
                'noSubTitle' => 'noSubTitle',
            ],
            'notificationRemoveWidget' =>
            [
                'mainTitle' => 'mainTitle',
                'mainSubTitle' => 'mainSubTitle',
                'mainYesBtn' => 'mainYesBtn',
                'mainNoBtn' => 'mainNoBtn',
                'yesTitle' => 'yesTitle',
                'yesSubTitle' => 'yesSubTitle',
                'noTitle' => 'noTitle',
                'noSubTitle' => 'noSubTitle',
            ],
            'notificationRemoveWidgetItem' =>
            [
                'mainTitle' => 'mainTitle',
                'mainSubTitle' => 'mainSubTitle',
                'mainYesBtn' => 'mainYesBtn',
                'mainNoBtn' => 'mainNoBtn',
                'yesTitle' => 'yesTitle',
                'yesSubTitle' => 'yesSubTitle',
                'noTitle' => 'noTitle',
                'noSubTitle' => 'noSubTitle',
            ],
            'notificationChangeLanguage' =>
            [
                'mainTitle' => 'mainTitle',
                'mainSubTitle' => 'mainSubTitle',
                'mainYesBtn' => 'mainYesBtn',
                'mainNoBtn' => 'mainNoBtn',
                'yesTitle' => 'yesTitle',
                'yesSubTitle' => 'yesSubTitle',
                'noTitle' => 'noTitle',
                'noSubTitle' => 'noSubTitle',
            ],
            'l10n' =>
            [
                'validationRequiredError' => 'validationRequiredError',
            ],
            'setPositionUrl' => '',
            'addWidgetUrl' => route('widget.add'),
            'widgetOnOffUrl' => '',
            'widgetDestroyUrl' => '',
            'widgetSaveUrl' => '',
            'uploadImageWidgetUrl' => '',
            'fileinputBrowseLabel' => '',
            'widgetAddBlockUrl' => '',
        ])
     !!}
</script>