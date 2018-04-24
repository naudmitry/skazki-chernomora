<?php

namespace App\Models;

use App\Repositories\Slug\SlugableInterface;
use App\Repositories\Slug\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FaqCategory
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $image_link
 * @property string $color
 * @property boolean $enable
 * @property integer $position
 * @property string $breadcrumbs
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Faq $faqs
 *
 * @mixin \Eloquent
 */
class FaqCategory extends Model implements SlugableInterface
{
    use SoftDeletes;
    use SlugableTrait;

    protected $appends =
        [
            'countFaqs',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function faqs()
    {
        return $this->belongsToMany(Faq::class);
    }

    /**
     * @return int
     */
    public function getCountFaqsAttribute()
    {
        return $this->faqs()->where('enable', true)->count();
    }
}
