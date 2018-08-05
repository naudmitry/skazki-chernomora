<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Faq\FaqCategoryRequest;
use App\Models\FaqCategory;
use App\Repositories\FaqRepository;
use App\Repositories\Slug\SlugsRepository;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    protected $faqRepository;
    protected $slugRepository;

    /**
     * FaqCategoryController constructor.
     * @param FaqRepository $faqRepository
     * @param SlugsRepository $slugRepository
     */
    public function __construct(FaqRepository $faqRepository, SlugsRepository $slugRepository)
    {
        $this->faqRepository = $faqRepository;
        $this->slugRepository = $slugRepository;

        parent::__construct();
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
     */
    public function delete(FaqCategory $category)
    {
        \DB::transaction(function () use (&$category) {
            $category->slug()->delete();
            $category->delete();
        });

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
        \DB::transaction(function () use (&$category, $request)
        {
            $category = $this->faqRepository->saveCategory($category, $request->all());
            $this->slugRepository->updateSlug($category, $request['address']);
        });

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
