<?php

namespace App\Http\Controllers\Site;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

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

        return view('site/blog/index', compact([
            'categories', 'blogs'
        ]));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single(Blog $blog)
    {
        $categories = BlogCategory::query()
            ->where('enable', true)
            ->get();

        return view('site/blog/single', compact([
            'blog', 'categories'
        ]));
    }
}
