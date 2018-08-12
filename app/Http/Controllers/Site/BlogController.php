<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $categories = BlogCategory::query()
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $blogs = Blog::query()
            ->where('enable', true);

        if ($request->has('category')) {
            $blogs->whereHas('categories', function ($query) use ($request) {
                $query->where('name', $request->get('category'));
            });
        }

        $blogs = $blogs->paginate(3);

        return view('site.blog.index', compact([
            'categories', 'blogs'
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

        /** @var BlogCategory $currentCategory */
        $currentCategory = $blog->categories()->find(request()->get('category_id', null));

        $categories = BlogCategory::query()
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        return view('site.blog.single.index', compact([
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

        $categories = BlogCategory::query()
            ->where('enable', true)
            ->orderBy('position')
            ->get();

        $blogs = $category->blogs()
            ->where('enable', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $currentCategory = $category;

        return view('site.blog.category.index', compact([
            'blogs', 'categories', 'currentCategory'
        ]));

    }
}
