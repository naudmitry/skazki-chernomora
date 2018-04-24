<?php

namespace App\Models;

use App\Repositories\Slug\SlugableInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Slug
 *
 * @property integer $id
 * @property string $slug
 * @property string $entity_type
 * @property integer $entity_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Model|SlugableInterface $entity
 *
 * @mixin \Eloquent
 */
class Slug extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function entity()
    {
        return $this->morphTo();
    }
}
