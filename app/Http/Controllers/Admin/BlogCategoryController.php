<?php

namespace App\Http\Controllers\Admin;

use App\Classes\StaticPageTypesEnum;
use App\Http\Requests\Blog\BlogCategoryRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogRepository;
use App\Repositories\PageRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    protected $blogRepository;
    protected $slugRepository;
    protected $pageRepository;

    /**
     * BlogCategoryController constructor.
     * @param BlogRepository $blogRepository
     * @param SlugRepository $slugRepository
     * @param PageRepository $pageRepository
     */
    public function __construct(BlogRepository $blogRepository, SlugRepository $slugRepository, PageRepository $pageRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->slugRepository = $slugRepository;
        $this->pageRepository = $pageRepository;

        parent::__construct();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = BlogCategory::query()
            ->orderBy('position')
            ->get();

        $staticPage = $this->pageRepository->getStaticPage(StaticPageTypesEnum::BLOG_PAGE);

        return view('admin.blog.categories.index', compact(
            'categories', 'staticPage'
        ));
    }

    /**
     * @param BlogCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BlogCategory $category)
    {
        return view('admin.blog.categories.includes.settings', compact(
            'category'
        ));
    }

    /**
     * @param BlogCategoryRequest $request
     * @param BlogCategory|null $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(BlogCategoryRequest $request, BlogCategory $category = null)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                BlogCategory::class,
                $category->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        \DB::transaction(function () use (&$category, $request) {
            $category = $this->blogRepository->saveCategory($category, $request->all());
            $this->slugRepository->updateSlug($category, $request['address']);
        });

        $row = view('admin.blog.categories.includes.item', compact(
            'category'
        ))->render();

        $settings = view('admin.blog.categories.includes.settings', compact(
            'category'
        ))->render();

        return response()->json([
            'message' => 'Категория новости успешно сохранена.',
            'category' => $category,
            'row' => $row,
            'settings' => $settings,
        ]);
    }

    /**
     * @param BlogCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(BlogCategory $category)
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category = new BlogCategory();

        return view('admin.blog.categories.includes.settings', compact([
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
        $items = BlogCategory::query()->whereIn('id', $categories)->get();

        \DB::transaction(function () use ($items, $categories) {
            /** @var BlogCategory $item */
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
     * @param BlogCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(BlogCategory $category)
    {
        $category->enable = !$category->enable;
        $category->update();

        return response()->json([
            'message' => 'Доступность категории изменена.',
        ]);
    }
}
