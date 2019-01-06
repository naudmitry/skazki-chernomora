<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Blog\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Company;
use App\Models\Showcase;
use App\Repositories\BlogRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BlogController extends Controller
{
    protected $blogRepository;
    protected $slugRepository;

    /**
     * BlogController constructor.
     * @param BlogRepository $blogRepository
     * @param SlugRepository $slugRepository
     */
    public function __construct(BlogRepository $blogRepository, SlugRepository $slugRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->slugRepository = $slugRepository;

        parent::__construct();
    }

    /**
     * @param Request $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Company $administeredCompany, Showcase $administeredShowcase)
    {
        $blogQuery = Blog::query()
            ->with('updater')
            ->with('categories')
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        $counters =
            [
                'enable_news_count' => (clone $blogQuery)->where('enable', true)->count(),
                'view_count_total' => (clone $blogQuery)->sum('view_count'),
            ];

        if ($request->ajax()) {
            return Datatables::of($blogQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.blog.articles.index', compact(
            'counters', 'administeredShowcase'
        ));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Blog $blog)
    {
        $blog->enable = !$blog->enable;
        $blog->update();

        return response()->json([
            'message' => 'Доступность статьи успешно изменена.',
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $administeredCompany, Showcase $administeredShowcase, Blog $blog)
    {
        $categories = BlogCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        return view('main_admin.blog.articles.item.index', compact(
            'blog', 'categories'
        ));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function delete(Blog $blog)
    {
        \DB::transaction(function () use (&$blog) {
            $this->slugRepository->deleteSlug($blog);
            $blog->delete();
        });

        return response()->json([
            'message' => 'Новость удалена.'
        ]);
    }

    /**
     * @param BlogRequest $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Blog|null $blog
     * @param bool $isNew
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(BlogRequest $request, Company $administeredCompany, Showcase $administeredShowcase, Blog $blog = null, $isNew = false)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                $administeredShowcase,
                Blog::class,
                $blog->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        if (!isset($blog)) {
            $isNew = true;
        }

        $data = $request->all();
        $data['company_id'] = $administeredCompany->id;
        $data['showcase_id'] = $administeredShowcase->id;

        \DB::transaction(function () use (&$blog, $data) {
            $blog = $this->blogRepository->saveBlog($blog, $data);
            $this->slugRepository->updateSlug($blog, $data['address']);
        });

        $categories = BlogCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        $settings = $isNew ? null : $settings = view('main_admin.blog.articles.item.settings', compact(
            'blog', 'categories', 'administeredShowcase'
        ))->render();

        return response()->json([
            'message' => 'Статья успешно сохранена.',
            'redirectUrl' => $isNew ? route('admin.blog.article.edit', $blog) : null,
            'settings' => $settings,
        ]);
    }

    /**
     * @param Request $request
     * @param Blog $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveContent(Request $request, Blog $blog)
    {
        $blog->link = $request->get('link');
        $blog->content = $request->get('content');
        $blog->update();

        return response()->json([
            'message' => 'Статья успешно сохранена.',
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Company $administeredCompany, Showcase $administeredShowcase)
    {
        $categories = BlogCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        return view('main_admin.blog.articles.item.create', compact(
            'categories'
        ));
    }
}
