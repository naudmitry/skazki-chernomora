<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageCategoryRequest;
use App\Models\PageCategory;
use App\Repositories\PageRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = PageCategory::query()
            ->orderBy('position')
            ->get();

        return view('admin.page.categories.index', compact(
            'categories'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category = new PageCategory();

        return view('admin.page.categories.includes.settings', compact([
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
        $items = PageCategory::whereIn('id', $categories)->get();

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
     */
    public function edit(PageCategory $category)
    {
        return view('admin.page.categories.includes.settings', compact(
            'category'
        ));
    }

    /**
     * @param PageCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(PageCategory $category)
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
     * @param PageCategoryRequest $request
     * @param PageCategory|null $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(PageCategoryRequest $request, PageCategory $category = null)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                PageCategory::class,
                $category->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        \DB::transaction(function () use (&$category, $request) {
            $category = $this->pageRepository->saveCategory($category, $request->all());
            $this->slugRepository->updateSlug($category, $request['address']);
        });

        $row = view('admin.page.categories.includes.item', compact(
            'category'
        ))->render();

        $settings = view('admin.page.categories.includes.settings', compact(
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
