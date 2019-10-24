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
}
