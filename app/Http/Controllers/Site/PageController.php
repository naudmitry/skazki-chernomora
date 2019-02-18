<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use App\Repositories\Widgets\WidgetRepository;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    protected $widgetRepository;

    /**
     * PageController constructor.
     * @param WidgetRepository $widgetRepository
     */
    public function __construct(WidgetRepository $widgetRepository)
    {
        $this->widgetRepository = $widgetRepository;

        parent::__construct();
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     * @throws \Throwable
     */
    public function single(Page $page)
    {
        if (false == $page->enable) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $page->incrementViewsCount();

        $widgetContainer = $page->widgetContainer;

        $pageWidgets = $widgetContainer ?
            app(WidgetRepository::class)->getWidgetsByContainer($page->widgetContainer) :
            [];

        return view($this->theme . '.page.single', compact(['page', 'pageWidgets']));
    }
}
