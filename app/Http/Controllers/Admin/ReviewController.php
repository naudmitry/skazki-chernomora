<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Showcase;
use App\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    public function index(Request $request, Company $administeredCompany, Showcase $administeredShowcase)
    {
        $reviewsQuery = Review::query()
            ->with('buyer')
            ->where('company_id', $administeredCompany->id)
            ->where('showcase_id', $administeredShowcase->id)
            ->get();

        if ($request->ajax()) {
            return Datatables::of($reviewsQuery)
                ->make(true);
        }

        return view('main_admin.reviews.index');
    }

    public function edit(Company $administeredCompany, Showcase $administeredShowcase, Review $review)
    {
        return null;
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
            'message' => 'Отзыв удален.'
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function modal()
    {
        return response()->json([
            'view' => view('main_admin.reviews.modals.create')->render(),
        ]);
    }
}