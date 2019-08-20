<?php

namespace App\Models;

use App\Classes\TypeVisitEnum;
use App\Repositories\Date\DateableTrait;
use App\Repositories\Showcase\ShowcasableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PreEntry
 * @package App\Models
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $showcase_id
 * @property string $full_name
 * @property string $phone_number
 * @property string $email
 * @property Carbon $desired_at
 * @property integer $salt_cave_id
 * @property string $type
 * @property string $message
 *
 * @property-read SaltCave $saltCave
 *
 * @mixin \Eloquent
 */
class PreEntry extends Model
{
    use SoftDeletes;
    use ShowcasableTrait;
    use DateableTrait;

    protected $dates =
        [
            'desired_at'
        ];

    protected $appends =
        [
            'formatCreatedAt',
            'formatUpdatedAt',
            'formatDesiredAt',
            'typeI18n',
            'saltCaveTitle'
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function saltCave()
    {
        return $this->belongsTo(SaltCave::class);
    }

    /**
     * @return mixed
     */
    public function getTypeI18nAttribute()
    {
        return TypeVisitEnum::$labels[$this->type];
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
    public function getFormatDesiredAtAttribute()
    {
        return $this->desired_at->format('d/m/Y');
    }
}
