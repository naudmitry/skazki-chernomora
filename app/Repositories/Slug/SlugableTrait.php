<?php

namespace App\Repositories\Slug;

use App\Models\Slug;

/**
 * Trait SlugableTrait
 * @package App\Repositories\Slug
 */
trait SlugableTrait
{
    /**
     * @return mixed
     */
    public function slug()
    {
        return $this->morphMany(Slug::class, 'entity');
    }

    /**
     * @return null
     */
    public function getSlug()
    {
        $obj = $this->slug()->first();

        return $obj ? $obj->slug : null;
    }

}