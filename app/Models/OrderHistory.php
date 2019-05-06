<?php

namespace App\Models;

use App\Repositories\Showcase\ShowcasableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderHistory
 * @package App
 *
 * @property integer $id
 * @property integer $showcase_id
 * @property integer $buyer_id
 * @property integer $order_id
 * @property Carbon $date_at
 *
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Buyer $buyer
 * @property-read \App\Models\Showcase $showcase
 *
 * @mixin \Eloquent
 */
class OrderHistory extends Model
{
    use ShowcasableTrait;

    protected $dates =
        [
            'date_at',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}
