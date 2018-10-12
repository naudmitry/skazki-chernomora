<?php

namespace App\Http\Controllers\Site;

use App\Classes\StaticPageTypesEnum;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FaqController extends Controller
{
    protected $pagesRepository;

    /**
     * FaqController constructor.
     * @param PageRepository $pagesRepository
     */
    public function __construct(PageRepository $pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;

        parent::__construct();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $categories = FaqCategory::query()
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $faqs = Faq::query()
            ->where('enable', true);

        if ($request->has('category')) {
            $faqs->whereHas('categories', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $faqs = $faqs->paginate(5);

        $staticPage = $this->pagesRepository->getStaticPage(StaticPageTypesEnum::FAQ_PAGE);
        $staticPage->incrementViewsCount();

        return view('main_theme.faq.index', compact([
            'categories', 'faqs', 'staticPage'
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

        /** @var FaqCategory $currentCategory */
        $currentCategory = $faq->categories()->find(request()->get('category_id', null));

        $categories = FaqCategory::query()
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $faq->incrementViewsCount();

        return view('main_theme.faq.single.index', compact([
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

        $categories = FaqCategory::query()
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $faqs = $category->faqs()
            ->where('enable', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $currentCategory = $category;

        return view('main_theme.faq.category.index', compact([
            'faqs', 'categories', 'currentCategory'
        ]));

    }
}
