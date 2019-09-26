<?php

namespace App\Http\Controllers\Site;

use App\Classes\StandardColorsShowcaseEnum;
use App\Classes\StaticPageTypesEnum;
use App\Models\Page;
use App\Models\PageCategory;
use App\Repositories\PageRepository;
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

        $staticPage = app(PageRepository::class)->getStaticPage($this->showcase, StaticPageTypesEnum::BLOG_PAGE);

        return view($this->showcase->theme . '.page.single', compact([
            'page', 'pageWidgets', 'staticPage'
        ]));
    }

    /**
     * @param PageCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(PageCategory $category)
    {
        if (false == $category->enable) {
            abort(\Illuminate\Http\Response::HTTP_NOT_FOUND);
        }

        $pages = $category->pages()
            ->where('enable', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view($this->showcase->theme . '.vendor.category_page.grid.4columns', [
            'entities' => $pages,
            'category' => $category
        ]);
    }

    /**
     * @return mixed
     */
    public function getCustomStyles()
    {
        $color = $this->showcase->config('styles:color');

        if (!$color) {
            $color = StandardColorsShowcaseEnum::MAIN_COLOR_HEX;
        }

        $content = view('miracle.vendor.styles', compact('color'));

        return response($content)->header('Content-Type', 'text/css');
    }
}
