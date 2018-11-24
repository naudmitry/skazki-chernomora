<?php

namespace App\Repositories\Slug;

use App\Models\Showcase;
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
        $obj = $this->slug()
            ->where('showcase_id', $this->showcase_id)
            ->first();

        return $obj ? $obj->slug : null;
    }

    public function getRoute($extraOptions = [])
    {
        $slug = $this->getSlug();

        $options = count($extraOptions) ? array_merge([$slug], $extraOptions) : $slug;

        return $slug ? route('slug.index', $options) : '/';
    }

    /**
     * @param Showcase $showcase
     * @return string
     */
    public function getShowcaseUrl(Showcase $showcase)
    {
        return $showcase->http_origin . '/' . $this->getSlug();
    }
}
