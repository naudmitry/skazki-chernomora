<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Faq\FaqRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Repositories\FaqRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    private $faqRepository;

    /**
     * FaqController constructor.
     * @param FaqRepository $faqRepository
     */
    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $faqQuery = Faq::all();

        if ($request->ajax()) {
            return Datatables::of($faqQuery)
                ->make(true);
        }

        return view('admin.faq.questions.index');
    }

    /**
     * @param Faq $faq
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();

        return view('admin.faq.questions.item.index', compact(
            'faq', 'categories'
        ));
    }

    /**
     * @param Faq $faq
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Faq $faq)
    {
        $faq->delete();

        return response()->json([
            'message' => 'Вопрос удален.',
            'blog' => $faq,
        ]);
    }

    /**
     * @param Faq $faq
     * @return \Illuminate\Http\JsonResponse
     */
    public function enable(Faq $faq)
    {
        $faq->enable = !$faq->enable;
        $faq->update();

        return response()->json([
            'message' => 'Доступность вопроса успешно изменена.',
        ]);
    }

    /**
     * @param FaqRequest $request
     * @param Faq|null $faq
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(FaqRequest $request, Faq $faq = null)
    {
        $this->faqRepository->saveFaq($faq, $request->all());

        return response()->json([
            'message' => 'Вопрос успешно сохранен.',
        ]);
    }
}
