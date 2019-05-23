<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReviewRequest;
use App\Models\Company;
use App\Models\Showcase;
use App\Repositories\ReviewRepository;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    private $reviewRepository;

    /**
     * ReviewController constructor.
     * @param ReviewRepository $reviewRepository
     */
    public function __construct(ReviewRepository $reviewRepository)
    {
        parent::__construct();

        $this->reviewRepository = $reviewRepository;
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
        $reviewsQuery = Review::query()
            ->with('buyer')
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        $counters =
            [
                'positive_count' => (clone $reviewsQuery)->where('rating', '>', 3)->count(),
                'negative_count' => (clone $reviewsQuery)->where('rating', '<=', 3)->count(),
                'average_rating' => (clone $reviewsQuery)->avg('rating'),
            ];

        if ($request->ajax()) {
            return Datatables::of($reviewsQuery)
                ->with(compact('counters'))
                ->make(true);
        }

        return view('main_admin.reviews.index');
    }

    /**
     * @param Review $review
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Review $review)
    {
        $review->delete();

        return response()->json([
            'message' => 'Запись успешно удалена.'
        ]);
    }

    /**
     * @param Review|null $review
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function modal(Review $review = null)
    {
        return response()->json([
            'view' => view('main_admin.reviews.modals.create', compact('review'))->render(),
        ]);
    }

    /**
     * @param ReviewRequest $request
     * @param Company $administeredCompany
     * @param Showcase $administeredShowcase
     * @param Review|null $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(ReviewRequest $request, Company $administeredCompany, Showcase $administeredShowcase, Review $review = null)
    {
        $data = $request->all();
        $data['company_id'] = $administeredCompany->id;
        $data['showcase_id'] = $administeredShowcase->id;
        $data['ip'] = $request->ip();

        $review = isset($review) ? $review : new Review();

        $this->reviewRepository->save($review, $data);

        return response()->json([
            'message' => 'Запись успешно сохранена.'
        ]);
    }

    /**
     * @param Review $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function widgeted(Review $review)
    {
        $review->is_widget = !$review->is_widget;
        $review->update();

        return response()->json([
            'message' => 'Доступность успешно изменена.',
        ]);
    }
}