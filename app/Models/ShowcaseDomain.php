<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowcaseDomain extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function showcase()
    {
        return $this->belongsTo(Showcase::class, 'showcase_id', 'id');
    }
}
