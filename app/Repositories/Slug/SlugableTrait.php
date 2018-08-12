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

    public function getRoute($extraOptions = [])
    {
        $slug = $this->getSlug();

        $options = count($extraOptions) ? array_merge([$slug], $extraOptions) : $slug;

        return $slug ? route('slug.index', $options) : null;
    }

    /**
     * @return string
     */
    public function getShowcaseUrl()
    {
        return 'http://' .  env('DOMAIN_CLIENT') . '/' . $this->getSlug();
    }

}