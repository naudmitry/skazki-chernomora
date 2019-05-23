<?php

namespace App\Models;

use App\Classes\ReviewStatusEnum;
use App\Repositories\Showcase\ShowcasableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Review
 * @package App
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $showcase_id
 * @property integer $buyer_id
 * @property string $ip
 * @property string $status
 * @property integer $rating
 * @property string $review
 * @property boolean $is_widget
 * @property string $reply
 * @property string $customer_name
 * @property string $customer_position
 * @property string $avatar_link
 *
 * @property Buyer $buyer
 *
 * @mixin \Eloquent
 */
class Review extends Model
{
    use SoftDeletes;
    use ShowcasableTrait;

    protected $appends =
        [
            'ratingStars',
            'transStatus'
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    /**
     * @return array
     */
    public function getRatingStarsAttribute()
    {
        $ratingStars = array();

        for ($i = 1; $i <= 5; $i++) {
            if ($this->rating >= $i) {
                $ratingStars[] = ['icon' => 'fas'];
            } else {
                $ratingStars[] = ['icon' => 'far'];
            }
        }

        return $ratingStars;
    }

    /**
     * @return mixed
     */
    public function getTransStatusAttribute()
    {
        return ReviewStatusEnum::$labels[$this->status];
    }
}
