<?php

namespace App\Http\Controllers\Site;

use App\Classes\StaticPageTypesEnum;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Showcase;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    protected $pagesRepository;

    /**
     * BlogController constructor.
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
        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        $categories = BlogCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $blogs = Blog::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true);

        if ($request->has('category')) {
            $blogs->whereHas('categories', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $blogs = $blogs->paginate(3);

        $staticPage = $this->pagesRepository->getStaticPage($showcase, StaticPageTypesEnum::BLOG_PAGE);
        $staticPage->incrementViewsCount();

        return view('main_theme.blog.index', compact([
            'categories', 'blogs', 'staticPage'
        ]));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single(Blog $blog)
    {
        if (false == $blog->enable) {
            abort(Response::HTTP_NOT_FOUND);
        }

        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        /** @var BlogCategory $currentCategory */
        $currentCategory = $blog->categories()->find(request()->get('category_id', null));

        $categories = BlogCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $blog->incrementViewsCount();

        return view('main_theme.blog.single.index', compact([
            'blog', 'categories', 'currentCategory'
        ]));
    }

    /**
     * @param BlogCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(BlogCategory $category)
    {
        if (false == $category->enable) {
            abort(Response::HTTP_NOT_FOUND);
        }

        /** @var Showcase $showcase */
        $showcase = $this->showcase;

        $categories = BlogCategory::query()
            ->where('showcase_id', $showcase->id)
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $blogs = $category->blogs()
            ->where('enable', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $currentCategory = $category;

        return view('main_theme.blog.category.index', compact([
            'blogs', 'categories', 'currentCategory'
        ]));
    }
}
