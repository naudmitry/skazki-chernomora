<?php

namespace App\Http\Controllers\Admin;

use App\Classes\StaticPageTypesEnum;
use App\Http\Requests\Blog\BlogCategoryRequest;
use App\Models\BlogCategory;
use App\Models\Company;
use App\Models\Showcase;
use App\Repositories\BlogRepository;
use App\Repositories\PageRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Company $administeredCompany, Showcase $administeredShowcase)
    {
        $categories = BlogCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->orderBy('position')
            ->get();

        $staticPage = $this->pageRepository->getStaticPage(
            $administeredShowcase,
            StaticPageTypesEnum::BLOG_PAGE
        );

        return view('main_admin.blog.categories.index', compact(
            'categories', 'staticPage'
        ));
    }

    /**
     * @param BlogCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BlogCategory $category)
    {
        return view('main_admin.blog.categories.includes.settings', compact(
            'category'
        ));
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param BlogCategoryRequest $request
     * @param BlogCategory|null $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(Company $administeredCompany, Showcase $administeredShowcase, BlogCategoryRequest $request, BlogCategory $category = null)
    {
        $this->validate($request, [
            'title' => Rule::unique('blog_categories')->where(function ($query) use ($category, $administeredShowcase) {
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
                BlogCategory::class,
                $category->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        $data = $request->all();
        $data['company_id'] = $administeredCompany->id;
        $data['showcase_id'] = $administeredShowcase->id;

        \DB::transaction(function () use (&$category, $data) {
            $category = $this->blogRepository->saveCategory($category, $data);
            $this->slugRepository->updateSlug($category, $data['address']);
        });

        $row = view('main_admin.blog.categories.includes.item', compact(
            'category'
        ))->render();

        $settings = view('main_admin.blog.categories.includes.settings', compact(
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
     * @throws \Throwable
     */
    public function delete(BlogCategory $category)
    {
        \DB::transaction(function () use (&$category) {
            $this->slugRepository->deleteSlug($category);
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

        return view('main_admin.blog.categories.includes.settings', compact(
            'category'
        ));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function sequence(Request $request)
    {
        $categories = $request->get('categories');
        $items = BlogCategory::query()
            ->whereIn('id', $categories)
            ->get();

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
