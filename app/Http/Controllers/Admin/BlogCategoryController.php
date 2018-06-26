<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Blog\BlogCategoryRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    private $blogRepository;

    /**
     * BlogCategoryController constructor.
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = BlogCategory::query()
            ->orderBy('position')
            ->get();

        return view('admin.blog.categories.index', compact(
            'categories'
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
        $category = $this->blogRepository->saveCategory($category, $request->all());

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
     * @throws \Exception
     */
    public function delete(BlogCategory $category)
    {
        $category->delete();

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
        return view('admin.blog.categories.includes.settings');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function sequence(Request $request)
    {
        $categories = $request->get('categories');
        $items = BlogCategory::whereIn('id', $categories)->get();

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
