<?php

namespace App\Http\Controllers\Admin;

use App\Classes\StaticPageTypesEnum;
use App\Http\Requests\Faq\FaqCategoryRequest;
use App\Models\FaqCategory;
use App\Repositories\FaqRepository;
use App\Repositories\PageRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    protected $faqRepository;
    protected $slugRepository;
    protected $pageRepository;

    /**
     * FaqCategoryController constructor.
     * @param FaqRepository $faqRepository
     * @param SlugRepository $slugRepository
     * @param PageRepository $pageRepository
     */
    public function __construct(FaqRepository $faqRepository, SlugRepository $slugRepository, PageRepository $pageRepository)
    {
        $this->faqRepository = $faqRepository;
        $this->slugRepository = $slugRepository;
        $this->pageRepository = $pageRepository;

        parent::__construct();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = FaqCategory::query()
            ->orderBy('position')
            ->get();

        $staticPage = $this->pageRepository->getStaticPage(StaticPageTypesEnum::FAQ_PAGE);

        return view('admin.faq.categories.index', compact(
            'categories', 'staticPage'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category = new FaqCategory();

        return view('admin.faq.categories.includes.settings', compact([
            'category'
        ]));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function sequence(Request $request)
    {
        $categories = $request->get('categories');
        $items = FaqCategory::whereIn('id', $categories)->get();

        \DB::transaction(function () use ($items, $categories) {
            /** @var FaqCategory $item */
            foreach ($items as $item) {
                $item->position = array_search($item->id, $categories);
                $item->save();
            }
        });

        return response([
            'message' => 'Порядок категорий сохранен.'
        ], 200);
    }

    /**
     * @param FaqCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(FaqCategory $category)
    {
        $category->enable = !$category->enable;
        $category->update();

        return response()->json([
            'message' => 'Доступность категории изменена.',
        ]);
    }

    /**
     * @param FaqCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FaqCategory $category)
    {
        return view('admin.faq.categories.includes.settings', compact(
            'category'
        ));
    }

    /**
     * @param FaqCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(FaqCategory $category)
    {
        \DB::transaction(function () use (&$category) {
            $category->slug()->delete();
            $category->delete();
        });

        return response()->json([
            'message' => 'Категория новости удалена.',
            'category' => $category,
        ]);
    }

    /**
     * @param FaqCategoryRequest $request
     * @param FaqCategory|null $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(FaqCategoryRequest $request, FaqCategory $category = null)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                FaqCategory::class,
                $category->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        \DB::transaction(function () use (&$category, $request) {
            $category = $this->faqRepository->saveCategory($category, $request->all());
            $this->slugRepository->updateSlug($category, $request['address']);
        });

        $row = view('admin.faq.categories.includes.item', compact(
            'category'
        ))->render();

        $settings = view('admin.faq.categories.includes.settings', compact(
            'category'
        ))->render();

        return response()->json([
            'message' => 'Категория вопроса успешно сохранена.',
            'category' => $category,
            'row' => $row,
            'settings' => $settings,
        ]);
    }
}
