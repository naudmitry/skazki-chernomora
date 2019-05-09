<?php

namespace App\Models;

use App\Repositories\Showcase\ShowcasableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $showcase_id
 * @property integer $manager_id
 * @property integer $salt_cave_id
 * @property integer $executant_id
 * @property integer $buyer_id
 * @property integer $amount_sessions
 * @property string $number
 * @property string $status
 * @property string $payment_type
 * @property string $payment_status
 * @property double $cost
 * @property double $paid
 * @property double $debt
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $begin_at
 * @property Carbon $end_at
 *
 * @property-read Company $company
 * @property-read Showcase $showcase
 * @property-read SaltCave $saltCave
 * @property-read Buyer $buyer
 * @property-read Buyer[] $buyers
 * @property-read OrderHistory[] $histories
 */
class Order extends Model
{
    use SoftDeletes;
    use ShowcasableTrait;

    protected $appends =
        [
            'formatCreatedAt'
        ];

    protected $dates =
        [
            'begin_at',
            'end_at',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return string
     */
    public function getFormatCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function saltCave()
    {
        return $this->belongsTo(SaltCave::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function buyers()
    {
        return $this->belongsToMany(Buyer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histories()
    {
        return $this->hasMany(OrderHistory::class);
    }
}
