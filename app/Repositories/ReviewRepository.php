<?php

namespace App\Repositories;

use App\Classes\ReviewStatusEnum;
use App\Models\Buyer;
use App\Models\Review;

/**
 * Class ReviewRepository
 * @package App\Repositories
 */
class ReviewRepository
{
    /**
     * @param Review $review
     * @param $data
     * @param Buyer|null $buyer
     */
    public function save(Review $review, $data, Buyer $buyer = null)
    {
        if (!array_has($data, 'review_id')) {
            $review->company_id = array_get($data, 'company_id');
            $review->showcase_id = array_get($data, 'showcase_id');
            $review->status = ReviewStatusEnum::NEW;
        }

        $review->ip = array_get($data, 'ip');
        $review->customer_name = array_get($data, 'customer_name');
        $review->customer_position = array_get($data, 'customer_position');
        $review->rating = array_get($data, 'rating');
        $review->is_widget = array_get($data, 'is_widget') == 'on' ? 1 : 0;
        $review->reply = array_get($data, 'reply');
        $review->review = array_get($data, 'review');
        $review->avatar_link = array_get($data, 'avatar_link');

        if (isset($buyer)) {
            $review->buyer()->associate($buyer);
        }

        $review->save();
    }
}
