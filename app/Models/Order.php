<?php

namespace App\Models;

use App\Classes\OrderStatus;
use App\Repositories\Date\DateableTrait;
use App\Repositories\Showcase\ShowcasableTrait;
use App\Traits\HistoriableTrait;
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
 * @property-read History[] $histories
 *
 * @mixin \Eloquent
 */
class Order extends Model
{
    use SoftDeletes;
    use ShowcasableTrait;
    use DateableTrait;
    use HistoriableTrait;

    protected $appends = [
        'formatCreatedAt',
        'formatUpdatedAt',
        'formatBeginAt',
        'formatEndAt',
        'saltCaveTitle',
        'statusI18n',
        'number'
    ];

    protected $dates = [
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
     * @return mixed
     */
    public function getSaltCaveTitleAttribute()
    {
        return $this->saltCave->title;
    }

    /**
     * @return string
     */
    public function getFormatBeginAtAttribute()
    {
        return $this->begin_at->format('d/m/Y');
    }

    /**
     * @return string
     */
    public function getFormatEndAtAttribute()
    {
        return $this->end_at->format('d/m/Y');
    }

    /**
     * @return mixed
     */
    public function getStatusI18nAttribute()
    {
        return OrderStatus::$labels[$this->status];
    }

    /**
     * @return string
     */
    public function getNumberAttribute()
    {
        return 'А-' . $this->id;
    }
}
