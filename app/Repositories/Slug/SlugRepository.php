<?php

namespace App\Repositories\Slug;

use App\Models\Showcase;
use App\Models\Slug;
use Illuminate\Validation\Rule;

/**
 * Class SlugsRepository
 * @package App\Repositories\Slug
 */
class SlugRepository
{
    /**
     * @param SlugableInterface $mixed
     * @param $slugStr
     * @return Slug|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\MorphTo|null|object
     */
    public function updateSlug(SlugableInterface $mixed, $slugStr)
    {
        $query = $mixed->slug();
        $slug = $query->first();

        if ($slug && $slug->slug == $slugStr) {
            return $slug;
        }

        if (!$slug) {
            $slug = new Slug;
            $slug->showcase()->associate($mixed->showcase);
            $slug->entity()->associate($mixed);
        }

        $slug->slug = $slugStr;
        $slug->save();

        return $slug;
    }

    /**
     * @param Showcase $showcase
     * @param $slugStr
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getSlug(Showcase $showcase, $slugStr)
    {
        $query = Slug::query()
            ->where('showcase_id', $showcase->id)
            ->where('slug', $slugStr);

        $obj = $query->first();

        return $obj;
    }

    /**
     * @param SlugableInterface $mixed
     */
    public function deleteSlug(SlugableInterface $mixed)
    {
        $mixed->slug()->get()->each(function (Slug $slug) {
            $slug->delete();
        });
    }

    /**
     * @param Showcase $showcase
     * @param null $slugableType
     * @param null $slugableId
     * @return \Illuminate\Validation\Rules\Unique
     */
    public function getSlugUniqueValidationRule(Showcase $showcase, $slugableType = null, $slugableId = null)
    {
        $uniqueRule = Rule::unique('slugs', 'slug')
            ->where('showcase_id', $showcase->id);

        if ($slugableType && $slugableId) {
            $ignoredItem = Slug::query()
                ->where('showcase_id', $showcase->id)
                ->where('entity_type', $slugableType)
                ->where('entity_id', $slugableId)
                ->first();

            if ($ignoredItem) {
                $uniqueRule = $uniqueRule->ignore($ignoredItem->id, 'id');
            }
        }

        return $uniqueRule;
    }

    /**
     * @param Showcase $showcase
     * @param $slug
     * @return bool
     */
    public function isSlugUsed(Showcase $showcase, $slug)
    {
        $matchesCount = Slug::query()
            ->where('showcase_id', $showcase->id)
            ->where('slug', $slug)
            ->count();

        return $matchesCount != 0;
    }
}
