<div class="tile" data-role="widgets-control-panel">
    <h4 class="line-head">Виджеты</h4>

    <div class="tile-body">
        <div class="form-group row blog-categories-list" id="container">
            <div class="col-md-9">
                <select class="form-control select2 select-add-block">
                    @foreach($allContainerWidgets as $widgetItem)
                        <option value="{{ $widgetItem['class_name'] }}">{{ $widgetItem['class_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
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
            'addWidgetUrl' => '',
            'widgetOnOffUrl' => '',
            'widgetDestroyUrl' => '',
            'widgetSaveUrl' => '',
            'uploadImageWidgetUrl' => '',
            'fileinputBrowseLabel' => '',
            'widgetAddBlockUrl' => '',
        ])
     !!}
</script>