<?php

namespace App\Http\Controllers\Site;

use App\Classes\PageTypesEnum;
use App\Classes\StaticPageTypesEnum;
use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Page;
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
        $staticPage = Page::query()
            ->where('showcase_id', $this->showcase->id)
            ->where('static_page_type', StaticPageTypesEnum::MAIN_PAGE)
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->first();

        $pageWidgets = $widgetRepository->getWidgetsForStaticPage($staticPage, WidgetsContainerTypesEnum::MAIN_PAGE);

        return view($this->theme . '.index', compact([
            'staticPage', 'pageWidgets'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog()
    {
        $staticPage = Page::query()
            ->where('showcase_id', $this->showcase->id)
            ->where('static_page_type', StaticPageTypesEnum::BLOG_PAGE)
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->first();

        return view($this->theme . '.blog.index', compact([
            'staticPage'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $staticPage = Page::query()
            ->where('showcase_id', $this->showcase->id)
            ->where('static_page_type', StaticPageTypesEnum::CONTACTS_PAGE)
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->first();

        return view($this->theme . '.contact.index', compact([
            'staticPage'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $staticPage = Page::query()
            ->where('showcase_id', $this->showcase->id)
            ->where('static_page_type', StaticPageTypesEnum::ABOUT_PAGE)
            ->where('type', PageTypesEnum::STATIC_PAGE)
            ->first();

        return view($this->theme . '.about.index', compact([
            'staticPage'
        ]));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function service()
    {
        return view($this->theme . '.service.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gallery()
    {
        return view($this->theme . '.gallery.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function team()
    {
        return view($this->theme . '.team.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function appointment()
    {
        return view($this->theme . '.appointment.index');
    }
}
