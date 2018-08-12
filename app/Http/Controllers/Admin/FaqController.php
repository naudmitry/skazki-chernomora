<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Faq\FaqRequest;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Repositories\FaqRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    protected $faqRepository;
    protected $slugRepository;

    /**
     * FaqController constructor.
     * @param FaqRepository $faqRepository
     * @param SlugRepository $slugRepository
     */
    public function __construct(FaqRepository $faqRepository, SlugRepository $slugRepository)
    {
        $this->faqRepository = $faqRepository;
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
     */
    public function delete(Faq $faq)
    {
        \DB::transaction(function () use (&$faq) {
            $faq->slug()->delete();
            $faq->delete();
        });

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
        \DB::transaction(function () use (&$faq, $request) {
            $this->faqRepository->saveFaq($faq, $request->all());
            $this->slugRepository->updateSlug($faq, $request['address']);
        });

        return response()->json([
            'message' => 'Вопрос успешно сохранен.',
        ]);
    }
}
