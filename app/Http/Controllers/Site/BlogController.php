<?php

namespace App\Http\Controllers\Site;

use App\Classes\StaticPageTypesEnum;
use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Showcase;
use App\Repositories\PageRepository;
use App\Repositories\Widgets\WidgetRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    protected $pagesRepository;
    protected $widgetRepository;

    /**
     * BlogController constructor.
     * @param PageRepository $pagesRepository
     * @param WidgetRepository $widgetRepository
     */
    public function __construct(PageRepository $pagesRepository, WidgetRepository $widgetRepository)
    {
        $this->pagesRepository = $pagesRepository;
        $this->widgetRepository = $widgetRepository;

        parent::__construct();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        $categories = BlogCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $blogs = Blog::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true);

        if ($request->has('category')) {
            $blogs->whereHas('categories', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $blogs = $blogs->paginate(10);

        $staticPage = $this->pagesRepository->getStaticPage($showcase, StaticPageTypesEnum::BLOG_PAGE);
        $staticPage->incrementViewsCount();

        $pageWidgets = $this->widgetRepository->getWidgetsForStaticPage(
            $staticPage, WidgetsContainerTypesEnum::BLOG_MAIN_PAGE
        );

        return view($this->theme . '.blog.index', compact([
            'categories', 'blogs', 'staticPage', 'pageWidgets'
        ]));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single(Blog $blog)
    {
        if (false == $blog->enable) {
            abort(Response::HTTP_NOT_FOUND);
        }

        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        if ($categoryId = request()->get('category_id', null))
        {
            /** @var BlogCategory $currentCategory */
            $currentCategory = $blog->categories()->find($categoryId);
        }

        $categories = BlogCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $blog->incrementViewsCount();

        $widgetContainer = $blog->widgetContainer;

        $pageWidgets = $widgetContainer ?
            app(WidgetRepository::class)->getWidgetsByContainer($blog->widgetContainer) :
            [];

        return view($this->theme . '.blog.single', compact([
            'blog', 'categories', 'currentCategory', 'pageWidgets'
        ]));
    }

    /**
     * @param BlogCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(BlogCategory $category)
    {
        if (false == $category->enable) {
            abort(Response::HTTP_NOT_FOUND);
        }

        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        $categories = BlogCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $blogs = $category->blogs()
            ->where('enable', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $currentCategory = $category;

        return view($this->theme . '.blog.category.index', compact([
            'blogs', 'categories', 'currentCategory'
        ]));
    }
}
