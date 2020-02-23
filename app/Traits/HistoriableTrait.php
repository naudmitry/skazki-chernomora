<?php

namespace App\Traits;

use App\Models\History;

trait HistoriableTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function histories()
    {
        return $this->morphMany(History::class, 'entity');
    }
}
