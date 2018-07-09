<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Faq\FaqCategoryRequest;
use App\Models\FaqCategory;
use App\Repositories\FaqRepository;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    private $faqRepository;

    /**
     * FaqCategoryController constructor.
     * @param FaqRepository $faqRepository
     */
    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = FaqCategory::query()
            ->orderBy('position')
            ->get();

        return view('admin.faq.categories.index', compact(
            'categories'
        ));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.faq.categories.includes.settings');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function sequence(Request $request)
    {
        $categories = $request->get('categories');
        $items = FaqCategory::whereIn('id', $categories)->get();

        \DB::transaction(function () use ($items, $categories) {
            /** @var FaqCategory $item */
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
     * @param FaqCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(FaqCategory $category)
    {
        $category->enable = !$category->enable;
        $category->update();

        return response()->json([
            'message' => 'Доступность категории изменена.',
        ]);
    }

    /**
     * @param FaqCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FaqCategory $category)
    {
        return view('admin.faq.categories.includes.settings', compact(
            'category'
        ));
    }

    /**
     * @param FaqCategory $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(FaqCategory $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Категория новости удалена.',
            'category' => $category,
        ]);
    }

    /**
     * @param FaqCategoryRequest $request
     * @param FaqCategory|null $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(FaqCategoryRequest $request, FaqCategory $category = null)
    {
        $category = $this->faqRepository->saveCategory($category, $request->all());

        $row = view('admin.faq.categories.includes.item', compact(
            'category'
        ))->render();

        $settings = view('admin.faq.categories.includes.settings', compact(
            'category'
        ))->render();

        return response()->json([
            'message' => 'Категория вопроса успешно сохранена.',
            'category' => $category,
            'row' => $row,
            'settings' => $settings,
        ]);
    }
}
