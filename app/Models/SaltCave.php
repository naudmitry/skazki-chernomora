<?php

namespace App\Models;

use App\Repositories\Date\DateableTrait;
use App\Repositories\Showcase\ShowcasableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SaltCave
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $address
 * @property string $working_time
 * @property string $phone_numbers
 * @property boolean $is_enabled
 * @property integer $company_id
 * @property integer $showcase_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Company $company
 * @property-read Showcase $showcase
 */
class SaltCave extends Model
{
    use SoftDeletes;
    use ShowcasableTrait;
    use DateableTrait;

    protected $casts = [
        'working_time' => 'array',
        'phone_numbers' => 'array',
    ];

    protected $appends = [
        'formatCreatedAt',
        'formatUpdatedAt'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
