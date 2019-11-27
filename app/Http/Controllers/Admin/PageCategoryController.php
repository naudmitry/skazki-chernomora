<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageCategoryRequest;
use App\Models\Company;
use App\Models\PageCategory;
use App\Models\Showcase;
use App\Repositories\PageRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageCategoryController extends Controller
{
    protected $slugRepository;
    protected $pageRepository;

    /**
     * PageCategoryController constructor.
     * @param PageRepository $pageRepository
     * @param SlugRepository $slugRepository
     */
    public function __construct(PageRepository $pageRepository, SlugRepository $slugRepository)
    {
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
        $categories = PageCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->orderBy('position')
            ->get();

        return view('main_admin.pages.categories.index', compact(
            'categories'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function create()
    {
        $category = new PageCategory();

        return response()->json([
            'view' => view('main_admin.pages.categories.includes.settings', compact('category'))->render(),
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
        $items = PageCategory::query()
            ->whereIn('id', $categories)
            ->get();

        \DB::transaction(function () use ($items, $categories) {
            /** @var PageCategory $item */
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
     * @param PageCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(PageCategory $category)
    {
        $category->enable = !$category->enable;
        $category->update();

        return response()->json([
            'message' => 'Доступность категории изменена.',
        ]);
    }

    /**
     * @param PageCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function edit(PageCategory $category)
    {
        return response()->json([
            'view' => view('main_admin.pages.categories.includes.settings', compact('category'))->render(),
            'categoryId' => $category->id
        ]);
    }

    /**
     * @param PageCategory $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function delete(PageCategory $category)
    {
        \DB::transaction(function () use (&$category) {
            $this->slugRepository->deleteSlug($category);
            $category->delete();
        });

        return response()->json([
            'message' => 'Категория страницы удалена.',
            'category' => $category,
        ]);
    }

    /**
     * @param PageCategoryRequest $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param PageCategory|null $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(PageCategoryRequest $request, Company $administeredCompany, Showcase $administeredShowcase, PageCategory $category = null)
    {
        $this->validate($request, [
            'title' => Rule::unique('page_categories')->where(function ($query) use ($category, $administeredShowcase) {
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
                PageCategory::class,
                $category->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        $data = $request->all();
        $data['company_id'] = $administeredCompany->id;
        $data['showcase_id'] = $administeredShowcase->id;

        \DB::transaction(function () use (&$category, $data) {
            $category = $this->pageRepository->saveCategory($category, $data);
            $this->slugRepository->updateSlug($category, $data['address']);
        });

        $row = view('main_admin.pages.categories.includes.item', compact(
            'category'
        ))->render();

        $settings = view('main_admin.pages.categories.includes.settings', compact(
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
