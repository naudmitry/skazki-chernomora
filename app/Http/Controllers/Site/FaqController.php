<?php

namespace App\Http\Controllers\Site;

use App\Classes\StaticPageTypesEnum;
use App\Classes\WidgetsContainerTypesEnum;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Showcase;
use App\Repositories\PageRepository;
use App\Repositories\Widgets\WidgetRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FaqController extends Controller
{
    protected $pagesRepository;
    protected $widgetRepository;

    /**
     * FaqController constructor.
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
     */
    public function index(Request $request)
    {
        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        $categories = FaqCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $faqs = Faq::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true);

        if ($request->has('category')) {
            $faqs->whereHas('categories', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $faqs = $faqs->paginate(5);

        $staticPage = $this->pagesRepository->getStaticPage($showcase, StaticPageTypesEnum::FAQ_PAGE);
        $staticPage->incrementViewsCount();

        $pageWidgets = $this->widgetRepository->getWidgetsForStaticPage($staticPage, WidgetsContainerTypesEnum::FAQ);

        return view($this->theme . '.faq.index', compact([
            'categories', 'faqs', 'staticPage', 'pageWidgets'
        ]));
    }

    /**
     * @param Faq $faq
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single(Faq $faq)
    {
        if (false == $faq->enable) {
            abort(Response::HTTP_NOT_FOUND);
        }

        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        /** @var FaqCategory $currentCategory */
        $currentCategory = $faq->categories()->find(request()->get('category_id', null));

        $categories = FaqCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $faq->incrementViewsCount();

        return view($this->theme . '.faq.single.index', compact([
            'faq', 'categories', 'currentCategory'
        ]));
    }

    /**
     * @param FaqCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(FaqCategory $category)
    {
        if (false == $category->enable) {
            abort(Response::HTTP_NOT_FOUND);
        }

        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        $categories = FaqCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $faqs = $category->faqs()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $currentCategory = $category;

        return view($this->theme . '.faq.category.index', compact([
            'faqs', 'categories', 'currentCategory'
        ]));

    }
}
