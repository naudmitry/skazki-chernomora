<?php

namespace App\Http\Controllers\Site;

use App\Classes\StaticPageTypesEnum;
use App\Classes\WidgetsContainerTypesEnum;
use App\Repositories\PageRepository;
use App\Repositories\Widgets\WidgetRepository;

class IndexController extends Controller
{
    /**
     * @param WidgetRepository $widgetRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     * @throws \Throwable
     */
    public function index(WidgetRepository $widgetRepository)
    {
        $staticPage = app(PageRepository::class)->getStaticPage($this->showcase, StaticPageTypesEnum::MAIN_PAGE);

        $pageWidgets = $widgetRepository->getWidgetsForStaticPage(
            $staticPage, WidgetsContainerTypesEnum::MAIN_PAGE
        );

        return view($this->showcase->theme . '.index', compact([
            'staticPage', 'pageWidgets'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $staticPage = app(PageRepository::class)->getStaticPage($this->showcase, StaticPageTypesEnum::CONTACTS_PAGE);
        $staticPage->incrementViewsCount();

        $pageWidgets = app(WidgetRepository::class)->getWidgetsForStaticPage(
            $staticPage, WidgetsContainerTypesEnum::BLOG_MAIN_PAGE
        );

        return view($this->showcase->theme . '.contact.index', compact([
            'staticPage', 'pageWidgets'
        ]));
    }
}
