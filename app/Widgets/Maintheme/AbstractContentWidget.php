<?php

namespace App\Widgets\Maintheme;

use App\Models\ShowcaseWidget;
use Arrilot\Widgets\AbstractWidget;

abstract class AbstractContentWidget extends AbstractWidget
{
    protected $blockable = false;

    protected $config = [];

    protected $defaultSettings = [];

    protected $widgetSetting;

    /** @var ShowcaseWidget|null */
    protected $showcaseWidget = null;
}
