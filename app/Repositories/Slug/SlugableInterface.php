<?php

namespace App\Repositories\Slug;


interface SlugableInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function slug();
}