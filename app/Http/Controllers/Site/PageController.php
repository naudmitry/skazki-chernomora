<?php

namespace App\Http\Controllers\Site;

use App\Classes\Coloring\ColorConverter;
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
        $color = empty($this->showcase->config('styles:color'))
            ? StandardColorsShowcaseEnum::MAIN_COLOR_HEX
            : $this->showcase->config('styles:color');

        $rgba = ColorConverter::hex2rgba($color, 0);
        $opaqueRgba = ColorConverter::hex2rgba($color, 0.85);

        $secondColor = empty($this->showcase->config('styles:second-color'))
            ? StandardColorsShowcaseEnum::SECOND_COLOR_HEX
            : $this->showcase->config('styles:second-color');

        $customStyles = $this->showcase->config('styles:custom');

        $content = view('miracle.vendor.styles', compact(
            'color',
            'secondColor',
            'customStyles',
            'rgba',
            'opaqueRgba'
        ));

        return response($content)->header('Content-Type', 'text/css');
    }
}
