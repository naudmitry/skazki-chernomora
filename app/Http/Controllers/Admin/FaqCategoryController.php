<?php

namespace App\Http\Controllers\Admin;

use App\Classes\StaticPageTypesEnum;
use App\Http\Requests\Faq\FaqCategoryRequest;
use App\Models\Company;
use App\Models\FaqCategory;
use App\Models\Showcase;
use App\Repositories\FaqRepository;
use App\Repositories\PageRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Company $administeredCompany, Showcase $administeredShowcase)
    {
        $categories = FaqCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->orderBy('position')
            ->get();

        $staticPage = $this->pageRepository->getStaticPage(
            $administeredShowcase,
            StaticPageTypesEnum::FAQ_PAGE
        );

        return view('main_admin.faq.categories.index', compact(
            'categories', 'staticPage'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create()
    {
        $category = new FaqCategory();

        return response()->json([
            'view' => view('main_admin.faq.categories.includes.settings', compact('category'))->render(),
            'categoryId' => $category->id
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function sequence(Request $request)
    {
        $categories = $request->get('categories');
        $items = FaqCategory::query()
            ->whereIn('id', $categories)
            ->get();

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
     * @throws \Throwable
     */
    public function edit(FaqCategory $category)
    {
        return response()->json([
            'view' => view('main_admin.faq.categories.includes.settings', compact('category'))->render(),
            'categoryId' => $category->id
        ]);
    }

    /**
     * @param FaqCategory $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function delete(FaqCategory $category)
    {
        \DB::transaction(function () use (&$category) {
            $this->slugRepository->deleteSlug($category);
            $category->delete();
        });

        return response()->json([
            'message' => 'Категория FAQ удалена.',
            'category' => $category,
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param FaqCategoryRequest $request
     * @param FaqCategory|null $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(Company $administeredCompany, Showcase $administeredShowcase, FaqCategoryRequest $request, FaqCategory $category = null)
    {
        $this->validate($request, [
            'title' => Rule::unique('faq_categories')->where(function ($query) use ($category, $administeredShowcase) {
                $query->where('showcase_id', $administeredShowcase->id)->whereNull('deleted_at');
                if (isset($category->id)) {
                    $query->where('id', '!=', $category->id);
                }
                return $query;
            }),
        ]);

        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                $administeredShowcase,
                FaqCategory::class,
                $category->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        $data = $request->all();
        $data['company_id'] = $administeredCompany->id;
        $data['showcase_id'] = $administeredShowcase->id;

        \DB::transaction(function () use (&$category, $data) {
            $category = $this->faqRepository->saveCategory($category, $data);
            $this->slugRepository->updateSlug($category, $data['address']);
        });

        $row = view('main_admin.faq.categories.includes.item', compact(
            'category'
        ))->render();

        $settings = view('main_admin.faq.categories.includes.settings', compact(
            'category'
        ))->render();

        return response()->json([
            'message' => 'Категория FAQ успешно сохранена.',
            'category' => $category,
            'row' => $row,
            'settings' => $settings,
        ]);
    }
}
