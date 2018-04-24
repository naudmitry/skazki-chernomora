<?php

namespace App\Widgets\Miracle;

use App\Models\ShowcaseWidget;
use App\Models\ShowcaseWidgetDescription;
use App\Repositories\Widgets\WidgetRepository;
use Arrilot\Widgets\AbstractWidget;

abstract class AbstractContentWidget extends AbstractWidget
{
    protected $blockable = false;
    protected $config = [];
    protected $defaultSettings = [];
    protected $widgetSetting;

    /** @var ShowcaseWidget|null */
    protected $showcaseWidget = null;

    /**
     * AbstractContentWidget constructor.
     * @param array $config
     * @throws \Exception
     */
    public function __construct($config = [])
    {
        parent::__construct($config);

        if (!$config) {
            return;
        }

        $widgetRepository = app(WidgetRepository::class);

        $this->showcaseWidget = array_get($this->config, 'widget');

        if (!$this->showcaseWidget instanceof ShowcaseWidget) {
            throw new \Exception('ContentWidget expert ShowcaseWidget as parameter');
        }

        $this->widgetSetting = $widgetRepository->getWidgetSettingForShowcase($this->showcaseWidget);
    }

    /**
     * @param $fileName
     * @return string
     */
    public function getTmplFile($fileName)
    {
        return sprintf("%s.%s.%s", 'miracle.widgets', class_basename($this), $fileName);
    }

    /**
     * @return string
     */
    public function getSettingsTmpl()
    {
        return $this->getTmplFile('settings');
    }

    /**
     * @return array
     */
    public function getDefaultSettings()
    {
        return $this->defaultSettings;
    }

    /**
     * @param ShowcaseWidget $showcaseWidget
     * @param ShowcaseWidgetDescription $widgetDescription
     * @return \stdClass
     */
    public function mutateSettings(ShowcaseWidget $showcaseWidget, ShowcaseWidgetDescription $widgetDescription): \stdClass
    {
        $setting = json_decode(json_encode($widgetDescription->setting));
        return $setting === [] ? (object)[] : $setting;
    }

    /**
     * @param $validatedData
     * @return null
     */
    public function getSettingsValidator($validatedData)
    {
        return null;
    }

    /**
     * @return string
     */
    public function getFrontTmpl()
    {
        return $this->getTmplFile('front');
    }

    /**
     * @return null|string
     */
    public function getBlockTmpl()
    {
        return $this->blockable ? $this->getTmplFile('block') : null;
    }

    /**
     * @return array
     */
    protected function getFrontViewData()
    {
        return
            [
                'widget_class' => class_basename(get_class($this)),
                'config' => $this->config,
                'setting' => $this->widgetSetting, // Recursive array to object convert
            ];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * @throws \Exception
     */
    public function run()
    {
        if (!$this->showcaseWidget) {
            throw new \Exception('ShowcaseWidget is not defined');
        }
        if ($this->blockable && data_get($this->widgetSetting, 'items', []) === []) {
            return "";
        } else {
            return view($this->getFrontTmpl(), $this->getFrontViewData());
        }
    }
}
