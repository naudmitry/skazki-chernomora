<?php

namespace App\Models;

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
 * @property string $name
 * @property string $phone_number
 * @property string $email
 * @property Carbon $desired_date
 * @property string $salt_cave
 * @property string $type
 * @property string $message
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Company $company
 * @property-read Showcase $showcase
 */
class Order extends Model
{
    use SoftDeletes;

    protected $appends =
        [
            'formatCreatedAt'
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
    public function showcase()
    {
        return $this->belongsTo(Showcase::class);
    }

    /**
     * @return string
     */
    public function getFormatCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
}
