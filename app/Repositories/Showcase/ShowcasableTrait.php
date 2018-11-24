<?php

namespace App\Repositories\Showcase;

use App\Models\Showcase;

trait ShowcasableTrait
{
    /**
     * @return mixed
     */
    public function showcase()
    {
        return $this->belongsTo(Showcase::class);
    }
}