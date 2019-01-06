<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Faq\FaqRequest;
use App\Models\Company;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\Showcase;
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
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request, Company $administeredCompany, Showcase $administeredShowcase)
    {
        $faqQuery = Faq::query()
            ->with('updater')
            ->with('categories')
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

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
            'counters', 'administeredShowcase'
        ));
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Faq $faq
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $administeredCompany, Showcase $administeredShowcase, Faq $faq)
    {
        $categories = FaqCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        return view('main_admin.faq.questions.item.index', compact(
            'faq', 'categories'
        ));
    }

    /**
     * @param Faq $faq
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function delete(Faq $faq)
    {
        \DB::transaction(function () use (&$faq) {
            $this->slugRepository->deleteSlug($faq);
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
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Faq|null $faq
     * @param bool $isNew
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(FaqRequest $request, Company $administeredCompany, Showcase $administeredShowcase, Faq $faq = null, $isNew = false)
    {
        $slugUniqueValidationRule = $this
            ->slugRepository
            ->getSlugUniqueValidationRule
            (
                $administeredShowcase,
                Faq::class,
                $faq->id ?? null
            );

        $this->validate($request, ['address' => [$slugUniqueValidationRule]]);

        if (!isset($faq)) {
            $isNew = true;
        }

        $data = $request->all();
        $data['company_id'] = $administeredCompany->id;
        $data['showcase_id'] = $administeredShowcase->id;

        \DB::transaction(function () use (&$faq, $data) {
            $faq = $this->faqRepository->saveFaq($faq, $data);
            $this->slugRepository->updateSlug($faq, $data['address']);
        });

        $categories = FaqCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        $settings = $isNew ? null : $settings = view('main_admin.faq.questions.item.settings', compact(
            'faq', 'categories', 'administeredShowcase'
        ))->render();

        return response()->json([
            'message' => 'Вопрос успешно сохранен.',
            'redirectUrl' => $isNew ? route('admin.faq.question.edit', $faq) : null,
            'settings' => $settings,
        ]);
    }

    /**
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Company $administeredCompany, Showcase $administeredShowcase)
    {
        $categories = FaqCategory::query()
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        return view('main_admin.faq.questions.item.create', compact(
            'categories'
        ));
    }
}
