<?php

namespace App\Repositories\Widgets;

use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Page;
use App\Models\Showcase;
use App\Models\ShowcaseWidget;
use App\Models\ShowcaseWidgetDescription;
use App\WidgetContainer;
use App\Widgets\Miracle as MiracleWidgets;
use App\Widgets\Miracle\AbstractContentWidget;

class WidgetRepository
{
    protected $containersConfig =
        [
            WidgetsContainerTypesEnum::MAIN_PAGE =>
                [
                    'type' => 'single',
                    'widgets' =>
                        [
                            MiracleWidgets\Slider::class => ['location' => 'top', 'single' => true],

                            MiracleWidgets\CallOutBox::class => ['location' => 'middle'],
                            MiracleWidgets\Trend::class => ['location' => 'middle'],
                            MiracleWidgets\FeaturesThree::class => ['location' => 'middle'],
                            MiracleWidgets\PostWrapper::class => ['location' => 'middle'],
                            MiracleWidgets\Parallax::class => ['location' => 'middle'],
                            MiracleWidgets\MultiBox::class => ['location' => 'middle'],
                            MiracleWidgets\Blog::class => ['location' => 'middle'],
                            MiracleWidgets\Banner::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\Video::class => ['location' => 'middle'],
                            MiracleWidgets\AnimatedInfographicPies::class => ['location' => 'middle'],
                            MiracleWidgets\Reviews::class => ['location' => 'middle', 'single' => true],

                            MiracleWidgets\FullwidthSliderGallery::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery1::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery2::class => ['location' => 'middle'],
                            MiracleWidgets\SmallPostGallery::class => ['location' => 'middle'],

                            MiracleWidgets\SimpleProcess::class => ['location' => 'middle'],
                            MiracleWidgets\CreativeProcess::class => ['location' => 'middle'],

                            MiracleWidgets\PostSlider::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithTitle::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderMiddleText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderOverlay::class => ['location' => 'middle'],
                        ],
                ],
            WidgetsContainerTypesEnum::BLOG_MAIN_PAGE =>
                [
                    'type' => 'multi',
                    'widgets' =>
                        [
                            MiracleWidgets\Banner::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\AnimatedInfographicPies::class => ['location' => 'middle'],
                            MiracleWidgets\Reviews::class => ['location' => 'middle', 'single' => true],

                            MiracleWidgets\FullwidthSliderGallery::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery1::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery2::class => ['location' => 'middle'],
                            MiracleWidgets\SmallPostGallery::class => ['location' => 'middle'],

                            MiracleWidgets\SimpleProcess::class => ['location' => 'middle'],
                            MiracleWidgets\CreativeProcess::class => ['location' => 'middle'],

                            MiracleWidgets\PostSlider::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithTitle::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderMiddleText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderOverlay::class => ['location' => 'middle'],
                        ],
                ],
            WidgetsContainerTypesEnum::BLOG_PAGE =>
                [
                    'type' => 'multi',
                    'widgets' =>
                        [
                            MiracleWidgets\BannerSmall::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\Quote::class => ['location' => 'middle'],
                            MiracleWidgets\Video::class => ['location' => 'middle'],
                            MiracleWidgets\AnimatedInfographicPies::class => ['location' => 'middle'],
                            MiracleWidgets\Highlights::class => ['location' => 'middle'],
                            MiracleWidgets\Reviews::class => ['location' => 'middle', 'single' => true],

                            MiracleWidgets\FullwidthSliderGallery::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery1::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery2::class => ['location' => 'middle'],
                            MiracleWidgets\SmallPostGallery::class => ['location' => 'middle'],

                            MiracleWidgets\SimpleProcess::class => ['location' => 'middle'],
                            MiracleWidgets\CreativeProcess::class => ['location' => 'middle'],

                            MiracleWidgets\PostSlider::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithTitle::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderMiddleText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderOverlay::class => ['location' => 'middle'],
                        ],
                ],
            WidgetsContainerTypesEnum::FAQ_MAIN_PAGE =>
                [
                    'type' => 'multi',
                    'widgets' =>
                        [
                            MiracleWidgets\BannerSmall::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\AnimatedInfographicPies::class => ['location' => 'middle'],
                            MiracleWidgets\Reviews::class => ['location' => 'middle', 'single' => true],

                            MiracleWidgets\FullwidthSliderGallery::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery1::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery2::class => ['location' => 'middle'],
                            MiracleWidgets\SmallPostGallery::class => ['location' => 'middle'],

                            MiracleWidgets\SimpleProcess::class => ['location' => 'middle'],
                            MiracleWidgets\CreativeProcess::class => ['location' => 'middle'],

                            MiracleWidgets\PostSlider::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithTitle::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderMiddleText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderOverlay::class => ['location' => 'middle'],
                        ],
                ],
            WidgetsContainerTypesEnum::FAQ_PAGE =>
                [
                    'type' => 'multi',
                    'widgets' =>
                        [
                            MiracleWidgets\BannerSmall::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\Quote::class => ['location' => 'middle'],
                            MiracleWidgets\Video::class => ['location' => 'middle'],
                            MiracleWidgets\AnimatedInfographicPies::class => ['location' => 'middle'],
                            MiracleWidgets\Highlights::class => ['location' => 'middle'],
                            MiracleWidgets\Reviews::class => ['location' => 'middle', 'single' => true],

                            MiracleWidgets\FullwidthSliderGallery::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery1::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery2::class => ['location' => 'middle'],
                            MiracleWidgets\SmallPostGallery::class => ['location' => 'middle'],

                            MiracleWidgets\SimpleProcess::class => ['location' => 'middle'],
                            MiracleWidgets\CreativeProcess::class => ['location' => 'middle'],

                            MiracleWidgets\PostSlider::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithTitle::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderMiddleText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderOverlay::class => ['location' => 'middle'],
                        ],
                ],
            WidgetsContainerTypesEnum::CUSTOM_PAGE =>
                [
                    'type' => 'multi',
                    'widgets' =>
                        [
                            MiracleWidgets\Banner::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\BannerSmall::class => ['location' => 'top', 'single' => true],

                            MiracleWidgets\MultiBox::class => ['location' => 'middle'],
                            MiracleWidgets\Quote::class => ['location' => 'middle'],
                            MiracleWidgets\Video::class => ['location' => 'middle'],
                            MiracleWidgets\FullwidthTabs::class => ['location' => 'middle'],
                            MiracleWidgets\AnimatedInfographicPies::class => ['location' => 'middle'],
                            MiracleWidgets\Highlights::class => ['location' => 'middle'],
                            MiracleWidgets\MakeAppointment::class => ['location' => 'middle', 'single' => true],
                            MiracleWidgets\Reviews::class => ['location' => 'middle', 'single' => true],

                            MiracleWidgets\FullwidthSliderGallery::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery1::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery2::class => ['location' => 'middle'],
                            MiracleWidgets\SmallPostGallery::class => ['location' => 'middle'],

                            MiracleWidgets\SimpleProcess::class => ['location' => 'middle'],
                            MiracleWidgets\CreativeProcess::class => ['location' => 'middle'],

                            MiracleWidgets\PostSlider::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithTitle::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderMiddleText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderOverlay::class => ['location' => 'middle'],
                        ],
                ],
            WidgetsContainerTypesEnum::CONTACTS_PAGE =>
                [
                    'type' => 'single',
                    'widgets' =>
                        [
                            MiracleWidgets\YandexMap::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\AnimatedInfographicPies::class => ['location' => 'middle'],

                            MiracleWidgets\FullwidthSliderGallery::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery1::class => ['location' => 'middle'],
                            MiracleWidgets\MetroGallery2::class => ['location' => 'middle'],
                            MiracleWidgets\SmallPostGallery::class => ['location' => 'middle'],

                            MiracleWidgets\SimpleProcess::class => ['location' => 'middle'],
                            MiracleWidgets\CreativeProcess::class => ['location' => 'middle'],

                            MiracleWidgets\PostSlider::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderWithTitle::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderMiddleText::class => ['location' => 'middle'],
                            MiracleWidgets\PostSliderOverlay::class => ['location' => 'middle'],

                            MiracleWidgets\HelpDesk::class => ['location' => 'middle', 'single' => true],
                        ],
                ],
            WidgetsContainerTypesEnum::HEADER =>
                [
                    'type' => 'single',
                    'widgets' =>
                        [
                            MiracleWidgets\Logo::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\OneLevelMenu::class => ['location' => 'middle'],
                            MiracleWidgets\TwoLevelMenu::class => ['location' => 'middle'],
                        ],
                ],
            WidgetsContainerTypesEnum::FOOTER =>
                [
                    'type' => 'single',
                    'widgets' =>
                        [
                            MiracleWidgets\CallOutBox2::class => ['location' => 'top', 'single' => true],
                            MiracleWidgets\PopularTags::class => ['location' => 'middle'],
                            MiracleWidgets\UsefulLinks::class => ['location' => 'middle'],
                            MiracleWidgets\RecentPosts::class => ['location' => 'middle'],
                            MiracleWidgets\FullwidthSliderGallery::class => ['location' => 'middle', 'single' => true],
                            MiracleWidgets\About::class => ['location' => 'middle', 'single' => true],
                            MiracleWidgets\CopyrightArea::class => ['location' => 'bottom', 'single' => true],
                        ],
                ],
        ];

    /**
     * @param Showcase $showcase
     * @param $containerType
     * @return WidgetContainer
     */
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

    /**
     * @param WidgetContainer $container
     * @return static
     */
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

    /**
     * @param Showcase $showcase
     * @param $container_type
     * @return WidgetRepository|array
     */
    public function getWidgetsBySingleContainerType(Showcase $showcase, $container_type)
    {
        $widgetContainer = $this->getContainerByType($showcase, $container_type);

        return $this->getWidgetsByContainer($widgetContainer);
    }

    /**
     * @param WidgetContainer $container
     * @return array|static
     */
    public function getWidgetsByContainer(WidgetContainer $container)
    {
        $containerItems = $container
            ->items()
            ->where('action', 1)
            ->orderBy('position')
            ->get();

        return $containerItems ? collect($containerItems)->groupBy('location') : [];
    }

    /**
     * @param WidgetableInterface $mixed
     * @param $containerType
     * @param Showcase $showcase
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
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

    /**
     * @param $id
     * @param $field
     * @param $value
     */
    public function setWidgetIdParameter($id, $field, $value)
    {
        ShowcaseWidget::where('id', $id)->update([$field => $value]);
    }

    /**
     * @param WidgetContainer $container
     * @param $widgetClassName
     * @return ShowcaseWidget
     * @throws \Exception
     */
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

    /**
     * @param $id
     */
    public function destroy($id)
    {
        ShowcaseWidget::destroy($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function find($id)
    {
        return ShowcaseWidget::find($id);
    }

    /**
     * @param ShowcaseWidget $showcaseWidget
     * @return mixed|\stdClass
     */
    public function getWidgetSettingForShowcase(ShowcaseWidget $showcaseWidget)
    {
        $widgetSetting = $showcaseWidget
            ->showcaseWidgetSettings()
            ->first();

        return $widgetSetting
            ? $this->mutateSettings($showcaseWidget, $widgetSetting)
            : json_decode(json_encode($this->getWidgetDefaultSettings($showcaseWidget)));
    }

    /**
     * @param $mixed
     * @param bool $mutate
     * @return ShowcaseWidgetDescription|array|\Illuminate\Database\Eloquent\Model|mixed|null|object|\stdClass|string|static
     */
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

    /**
     * @param ShowcaseWidget $showcaseWidget
     * @param ShowcaseWidgetDescription $widgetDescription
     * @return \stdClass
     */
    public function mutateSettings(ShowcaseWidget $showcaseWidget, ShowcaseWidgetDescription $widgetDescription): \stdClass
    {
        return $this->getViewWidgetObj($showcaseWidget)->mutateSettings($showcaseWidget, $widgetDescription);
    }

    /**
     * @param ShowcaseWidget $showcaseWidget
     * @return string
     */
    public function getWidgetSettingsTmpl(ShowcaseWidget $showcaseWidget): string
    {
        return $this->getViewWidgetObj($showcaseWidget)->getSettingsTmpl();
    }

    /**
     * @param ShowcaseWidget $showcaseWidget
     * @return string
     */
    public function getWidgetBlockTmpl(ShowcaseWidget $showcaseWidget): string
    {
        return $this->getViewWidgetObj($showcaseWidget)->getBlockTmpl();
    }

    /**
     * @param ShowcaseWidget $showcaseWidget
     * @return array
     */
    public function getWidgetDefaultSettings(ShowcaseWidget $showcaseWidget): array
    {
        return $this->getViewWidgetObj($showcaseWidget)->getDefaultSettings();
    }

    /**
     * @param $mixed
     * @return AbstractContentWidget
     */
    public function getViewWidgetObj($mixed)
    {
        $className = $mixed instanceof ShowcaseWidget ? $mixed->class_name : $mixed;
        return app("App\\Widgets\\Miracle\\" . $className);
    }

    /**
     * @param WidgetContainer $container
     * @return static
     */
    public function getContainerItemsMap(WidgetContainer $container)
    {
        return collect($container->items()->orderBy('position')->get())->groupBy('location');
    }

    /**
     * @param Page $page
     * @param $container_type
     * @return array|static
     * @throws \Exception
     * @throws \Throwable
     */
    public function getWidgetsForStaticPage(Page $page, $container_type)
    {
        $widgetContainer = $this->getOrCreateWidgetContainer($page, $container_type, $page->showcase);

        return $this->getWidgetsByContainer($widgetContainer);
    }
}