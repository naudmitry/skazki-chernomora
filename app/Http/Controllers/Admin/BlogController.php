<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Blog\BlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Repositories\BlogRepository;
use App\Repositories\Slug\SlugsRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BlogController extends Controller
{
    protected $blogRepository;
    protected $slugRepository;

    /**
     * BlogController constructor.
     * @param BlogRepository $blogRepository
     * @param SlugsRepository $slugRepository
     */
    public function __construct(BlogRepository $blogRepository, SlugsRepository $slugRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->slugRepository = $slugRepository;
    }

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

        return view('admin.blog.articles.item.index', compact(
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
            'message' => 'Новость удалена.',
            'blog' => $blog,
        ]);
    }

    /**
     * @param BlogRequest $request
     * @param Blog|null $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(BlogRequest $request, Blog $blog = null)
    {
        \DB::transaction(function () use (&$blog, $request)
        {
            $this->blogRepository->saveBlog($blog, $request->all());
            $this->slugRepository->updateSlug($blog, $request['address']);
        });

        return response()->json([
            'message' => 'Статья успешно сохранена.',
        ]);
    }

    /**
     * @param Request $request
     * @param Blog $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveContent(Request $request, Blog $blog)
    {
        $blog->content = $request->get('content');
        $blog->update();

        return response()->json([
            'message' => 'Статья успешно сохранена.',
        ]);
    }
}
