<?php

namespace App\Widgets\Miracle;

use App\Models\ShowcaseWidget;
use Arrilot\Widgets\AbstractWidget;
use App\Models\ShowcaseWidgetDescription;

abstract class AbstractContentWidget extends AbstractWidget
{
    protected $blockable = false;

    protected $config = [];

    protected $defaultSettings = [];

    protected $widgetSetting;

    /** @var ShowcaseWidget|null */
    protected $showcaseWidget = null;

    public function __construct($config = [])
    {
        parent::__construct($config);

        if( ! $config)
        {
            return;
        }

        $widgetRepository = app(WidgetRepository::class);

        $this->showcaseWidget = array_get($this->config, 'widget');

        if( ! $this->showcaseWidget instanceof ShowcaseWidget)
        {
            throw new \Exception('ContentWidget expert ShowcaseWidget as parameter');
        }

        $this->widgetSetting = $widgetRepository->getWidgetSettingForShowcase($this->showcaseWidget);
    }
}