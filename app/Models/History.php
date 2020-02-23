<?php

namespace App\Models;

use App\Classes\EventHistoryEnum;
use App\Repositories\Date\DateableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class History
 * @package App\Models
 *
 * @property string $entity_type
 * @property integer $entity_id
 * @property string $event
 * @property integer $object_id
 * @property string $object_type
 * @property integer $showcase_id
 * @property integer $author_id
 */
class History extends Model
{
    use DateableTrait;

    protected $with = [
        'author',
        'objectable'
    ];

    protected $appends = [
        'formatCreatedAt',
        'eventName'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function historiable()
    {
        return $this->morphTo('entity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function objectable()
    {
        return $this->morphTo('object');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Admin::class, 'author_id', 'id');
    }

    /**
     * @return mixed
     */
    public function getEventNameAttribute()
    {
        return EventHistoryEnum::$labels[$this->event];
    }
}
