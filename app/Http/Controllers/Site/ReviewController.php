<?php

namespace App\Http\Controllers\Site;

use App\Classes\ReviewStatusEnum;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{

    /**
     * @param ReviewRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(ReviewRequest $request)
    {
        $review = new Review();
        $review->customer_name = $request->get('customer_name');
        $review->ip = $request->ip();
        $review->status = ReviewStatusEnum::NEW;
        $review->rating = $request->get('rating');
        $review->review = $request->get('review');
        $review->customer_position = 'Посетитель';
        $review->avatar_link = '';
        $review->showcase_id = $this->showcase->id;
        $review->company_id = $this->showcase->company->id;
        $review->save();

        return response()->json(
            'success'
        );
    }
}
