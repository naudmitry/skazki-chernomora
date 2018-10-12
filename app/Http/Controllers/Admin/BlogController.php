<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Blog\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $blogQuery = Blog::all();

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
            'counters'
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
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();

        return view('main_admin.blog.articles.item.index', compact(
            'blog', 'categories'
        ));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Blog $blog)
    {
        \DB::transaction(function () use (&$blog) {
            $blog->slug()->delete();
            $blog->delete();
        });

        return response()->json([
            'message' => 'Новость удалена.'
        ]);
    }

    /**
     * @param BlogRequest $request
     * @param Blog|null $blog
     * @param bool $isNew
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(BlogRequest $request, Blog $blog = null, $isNew = false)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                Blog::class,
                $blog->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        if (!isset($blog)) {
            $isNew = true;
        }

        \DB::transaction(function () use (&$blog, $request) {
            $blog = $this->blogRepository->saveBlog($blog, $request->all());
            $this->slugRepository->updateSlug($blog, $request['address']);
        });

        $categories = BlogCategory::all();

        $settings = $isNew ? null : $settings = view('main_admin.blog.articles.item.settings', compact(
            'blog', 'categories'
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = BlogCategory::all();

        return view('main_admin.blog.articles.item.create', compact(
            'categories'
        ));
    }
}
