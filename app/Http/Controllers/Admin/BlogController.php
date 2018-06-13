<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BlogController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $blogQuery = Blog::all();

        if ($request->ajax()) {
            return Datatables::of($blogQuery)
                ->make(true);
        }

        return view('admin.blog.articles.index');
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeAvailability(Blog $blog)
    {
        $blog->enable = !$blog->enable;
        $blog->update();

        return response()->json([
            'message' => 'Доступность статьи успешно изменена.',
        ]);
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.articles.item.index', compact(
            'blog'
        ));
    }
}
