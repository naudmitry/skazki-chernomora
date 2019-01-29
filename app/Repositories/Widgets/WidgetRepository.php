<?php

namespace App\Repositories\Widgets;

use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Page;
use App\Models\Showcase;
use App\Models\ShowcaseWidget;
use App\Models\ShowcaseWidgetDescription;
use App\WidgetContainer;
use App\Widgets\Miracle as ContentWidgets;

class WidgetRepository
{
    protected $containersConfig =
        [
            WidgetsContainerTypesEnum::MAIN_PAGE =>
                [
                    'type' => 'single',
                    'widgets' =>
                        [

                        ],
                ],
            WidgetsContainerTypesEnum::BLOG =>
                [
                    'type' => 'multi',
                    'widgets' =>
                        [

                        ],
                ],
            WidgetsContainerTypesEnum::CUSTOM_PAGE =>
                [
                    'type' => 'multi',
                    'widgets' =>
                        [

                        ],
                ],
            WidgetsContainerTypesEnum::CONTACTS_PAGE =>
                [
                    'type' => 'single',
                    'widgets' =>
                        [

                        ],
                ],
            WidgetsContainerTypesEnum::HEADER =>
                [
                    'type' => 'single',
                    'widgets' =>
                        [
                            ContentWidgets\OneLevelMenu::class => ['location' => 'middle'],
                            ContentWidgets\TwoLevelMenu::class => ['location' => 'middle'],
                        ],
                ],
            WidgetsContainerTypesEnum::FOOTER =>
                [
                    'type' => 'single',
                    'widgets' =>
                        [

                        ],
                ],
        ];

    public function getContainerByType(Showcase $showcase, $containerType)
    {
        $container = WidgetContainer::whereShowcaseId($showcase->id)->where('type', $containerType)->first();

        if (!$container) {
            $container = new WidgetContainer;
            $container->showcase()->associate($showcase);
            $container->type = $containerType;
            $container->save();
        }

        return $container;
    }

    public function getWidgetsForContainer(WidgetContainer $container)
    {
        $containerWidgets = array_get($this->containersConfig, $container->type, null);

        $existingItems = $container
            ->items()
            ->select(['class_name'])
            ->groupBy('class_name')
            ->pluck('class_name')
            ->all();

        return collect($containerWidgets['widgets'])
            ->filter(function ($item, $key) use ($existingItems) {
                return array_get($item, 'single', false) == false || in_array(class_basename($key), $existingItems) == false;
            })
            ->map(function ($item, $key) {
                return array_merge($item, ['class_name' => class_basename($key)]);
            });
    }

    public function getWidgetsBySingleContainerType(Showcase $showcase, $container_type)
    {
        $widgetContainer = $this->getContainerByType($showcase, $container_type);

        return $this->getWidgetsByContainer($widgetContainer);
    }

    public function getWidgetsByContainer(WidgetContainer $container)
    {
        $containerItems = $container
            ->items()
            ->where('action', 1)
            ->orderBy('position')
            ->get();

        return $containerItems ? collect($containerItems)->groupBy('location') : [];
    }

    public function getOrCreateWidgetContainer(WidgetableInterface $mixed, $containerType, Showcase $showcase)
    {
        $container = $mixed->widgetContainer;
        if (!$container) {
            $container = \DB::transaction(function () use ($mixed, $containerType, $showcase) {
                $container = new WidgetContainer;
                $container->showcase()->associate($showcase);
                $container->widgetable()->associate($mixed);
                $container->type = $containerType;
                $container->save();
                $mixed->widgetContainer()->associate($container);
                $mixed->save();
                return $container;
            });
        }

        return $container;
    }

    public function setWidgetIdParameter($id, $field, $value)
    {
        ShowcaseWidget::where('id', $id)->update([$field => $value]);
    }

    public function addWidgetToContainer(WidgetContainer $container, $widgetClassName)
    {
        $widgetConfig = collect(array_get($this->containersConfig, $container->type)['widgets'])
            ->first(function ($item, $key) use ($widgetClassName) {
                return ends_with($key, '\\' . $widgetClassName);
            });

        if ($widgetConfig === null) {
            throw new \Exception('Widget ' . $widgetClassName . ' not found');
        }

        if (array_get($widgetConfig, 'single', false)) {
            $instancesCount = $container->items()->where('class_name', $widgetClassName)->count();
            if ($instancesCount != 0) {
                throw new \Exception('You can not create another instance of this widget');
            }
        }

        $maxPosition = $container
            ->items()
            ->select(\DB::raw('MAX(position) as max_position'))
            ->where('location', array_get($widgetConfig, 'location'))
            ->first()
            ->max_position;

        $showcaseWidget = new ShowcaseWidget;
        $showcaseWidget->container()->associate($container);
        $showcaseWidget->class_name = $widgetClassName;
        $showcaseWidget->location = array_get($widgetConfig, 'location');
        $showcaseWidget->single = array_get($widgetConfig, 'single', false);
        $showcaseWidget->action = false;
        $showcaseWidget->position = is_null($maxPosition) ? 0 : $maxPosition + 1;
        $showcaseWidget->save();

        return $showcaseWidget;
    }

    public function destroy($id)
    {
        ShowcaseWidget::destroy($id);
    }

    public function find($id)
    {
        return ShowcaseWidget::find($id);
    }

    public function getWidgetSettingForShowcase(ShowcaseWidget $showcaseWidget)
    {
        $widgetSetting = $showcaseWidget
            ->showcaseWidgetSettings()
            ->first();

        return $widgetSetting ?
            $this->mutateSettings($showcaseWidget, $widgetSetting) :
            json_decode(json_encode($this->getWidgetDefaultSettings($showcaseWidget)));
    }

    public function getWidgetSetting($mixed, $mutate = true)
    {
        $widget = ($mixed instanceof ShowcaseWidget) ? $mixed : $this->find($mixed);

        $widgetSetting = $widget
            ->showcaseWidgetSettings()
            ->first();

        if (empty($widgetSetting)) {
            $widgetSetting = new ShowcaseWidgetDescription;
            $widgetSetting->setting = $this->getWidgetDefaultSettings($widget);
            $widgetSetting->showcase_widgets_id = $widget->id;
            $widgetSetting->save();
        }

        return $mutate === null ?
            $widgetSetting :
            ($mutate ? $this->mutateSettings($widget, $widgetSetting) : $widgetSetting->setting);
    }

    public function mutateSettings(ShowcaseWidget $showcaseWidget, ShowcaseWidgetDescription $widgetDescription): \stdClass
    {
        return $this->getViewWidgetObj($showcaseWidget)->mutateSettings($showcaseWidget, $widgetDescription);
    }

    public function getWidgetSettingsTmpl(ShowcaseWidget $showcaseWidget): string
    {
        return $this->getViewWidgetObj($showcaseWidget)->getSettingsTmpl();
    }

    public function getWidgetBlockTmpl(ShowcaseWidget $showcaseWidget): string
    {
        return $this->getViewWidgetObj($showcaseWidget)->getBlockTmpl();
    }

    public function getWidgetDefaultSettings(ShowcaseWidget $showcaseWidget): array
    {
        return $this->getViewWidgetObj($showcaseWidget)->getDefaultSettings();
    }

    public function getViewWidgetObj($mixed)
    {
        $className = $mixed instanceof ShowcaseWidget ? $mixed->class_name : $mixed;
        return app("App\\Widgets\\ContentWidgets\\" . $className);
    }

    public function getContainerItemsMap(WidgetContainer $container)
    {
        return collect($container->items()->orderBy('position')->get())->groupBy('location');
    }

    public function getWidgetsForStaticPage(Page $page, $container_type)
    {
        $widgetContainer = $this->getOrCreateWidgetContainer($page, $container_type, $page->showcase);

        return $this->getWidgetsByContainer($widgetContainer);
    }
}