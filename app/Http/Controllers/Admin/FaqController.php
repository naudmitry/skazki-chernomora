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

        $counters =
            [
                'enable_faqs_count' => (clone $faqQuery)->where('enable', true)->count(),
                'view_count_total' => (clone $faqQuery)->sum('view_count'),
            ];

        if ($request->ajax()) {
            return Datatables::of($faqQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.faq.questions.index', compact(
            'counters'
        ));
    }

    /**
     * @param Faq $faq
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();

        return view('main_admin.faq.questions.item.index', compact(
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
            'message' => 'Вопрос удален.'
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
     * @param bool $isNew
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(FaqRequest $request, Faq $faq = null, $isNew = false)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                Faq::class,
                $faq->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        if (!isset($faq)) {
            $isNew = true;
        }

        \DB::transaction(function () use (&$faq, $request) {
            $faq = $this->faqRepository->saveFaq($faq, $request->all());
            $this->slugRepository->updateSlug($faq, $request['address']);
        });

        $categories = FaqCategory::all();

        $settings = $isNew ? null : $settings = view('main_admin.faq.questions.item.settings', compact(
            'faq', 'categories'
        ))->render();

        return response()->json([
            'message' => 'Вопрос успешно сохранен.',
            'redirectUrl' => $isNew ? route('admin.faq.question.edit', $faq) : null,
            'settings' => $settings,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = FaqCategory::all();

        return view('main_admin.faq.questions.item.create', compact(
            'categories'
        ));
    }
}
