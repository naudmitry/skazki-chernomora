<?php

namespace App\Repositories\Date;

use Carbon\Carbon;

/**
 * Class DateableTrait
 * @package App\Repositories\Date
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
trait DateableTrait
{
    /**
     * @return string
     */
    public function getFormatCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    /**
     * @return string
     */
    public function getFormatUpdatedAtAttribute()
    {
        return $this->updated_at->format('d/m/Y H:i');
    }
}