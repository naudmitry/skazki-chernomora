<?php

namespace App\Repositories\Slug;

use App\Models\Showcase;
use App\Repositories\Showcase\ShowcasableInterface;

/**
 * Interface SlugableInterface
 * @package App\Repositories\Slug
 */
interface SlugableInterface extends ShowcasableInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function slug();

    /**
     * @param Showcase $showcase
     * @return mixed
     */
    public function getShowcaseUrl(Showcase $showcase);
}
