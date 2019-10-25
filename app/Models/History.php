<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class History
 * @package App\Models
 *
 * @property string $entity_type
 * @property integer $entity_id
 * @property string $event
 * @property integer $buyer_id
 * @property integer $showcase_id
 * @property integer $author_id
 */
class History extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function historiable()
    {
        return $this->morphTo('entity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Admin::class);
    }
}
