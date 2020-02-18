<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Child
 * @package App\Models
 *
 * @property integer $id
 * @property integer $buyer_id
 * @property string $full_name
 * @property Carbon $birthday
 */
class Child extends Model
{
    protected $dates = [
        'birthday'
    ];

    protected $appends = [
        'age',
        'format_birthday'
    ];

    protected $with = [
        'buyer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    /**
     * @return int
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthday)->age;
    }

    /**
     * @return string
     */
    public function getFormatBirthdayAttribute()
    {
        return $this->birthday->format('d/m/Y');
    }
}
