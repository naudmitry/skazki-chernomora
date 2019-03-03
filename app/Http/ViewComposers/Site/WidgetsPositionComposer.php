<?php

namespace App\Http\ViewComposers\Site;

use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Showcase;
use App\Repositories\Widgets\WidgetRepository;
use Illuminate\View\View;

class WidgetsPositionComposer
{
    protected $widgetRepository;

    /**
     * WidgetsPositionComposer constructor.
     * @param WidgetRepository $widgetRepository
     */
    public function __construct(WidgetRepository $widgetRepository)
    {
        $this->widgetRepository = $widgetRepository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        /** @var Showcase $showcase */
        $showcase = config('front.showcase');

        $view->with('widgets_top', $this->widgetRepository->getWidgetsBySingleContainerType(
            $showcase, WidgetsContainerTypesEnum::HEADER
        ));

        $view->with('widgets_bottom', $this->widgetRepository->getWidgetsBySingleContainerType(
            $showcase, WidgetsContainerTypesEnum::FOOTER
        ));
    }
}