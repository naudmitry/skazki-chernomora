<?php

namespace App\Repositories\Slug;

use App\Models\Slug;
use Illuminate\Validation\Rule;

/**
 * Class SlugsRepository
 * @package App\Repositories\Slug
 */
class SlugsRepository
{
    /**
     * @param SlugableInterface $mixed
     * @param $slugStr
     * @return Slug
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
            $slug->entity()->associate($mixed);
        }

        $slug->slug = $slugStr;
        $slug->save();

        return $slug;
    }

    /**
     * @param $slugStr
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getSlug($slugStr)
    {
        $query = Slug::query()
            ->where('slug', $slugStr);

        $obj = $query->first();

        return $obj;
    }

    /**
     * @param SlugableInterface $mixed
     */
    public function deleteSlug(SlugableInterface $mixed)
    {
        $mixed->slug->each(function (Slug $slug) {
            $slug->delete();
        });
    }

    /**
     * @param null $slugableType
     * @param null $slugableId
     * @return $this|\Illuminate\Validation\Rules\Unique
     */
    public function getSlugUniqueValidationRule($slugableType = null, $slugableId = null)
    {
        $uniqueRule = Rule::unique('slugs', 'slug');

        if ($slugableType && $slugableId) {
            $ignoredItem = Slug::query()
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
     * @param $slug
     * @return bool
     */
    public function isSlugUsed($slug)
    {
        $matchesCount = Slug::query()
            ->where('slug', $slug)
            ->count();

        return $matchesCount != 0;
    }
}
