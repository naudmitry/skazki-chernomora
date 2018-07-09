<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FaqCategory
 * @package App\Models
 *
 * @property string $title
 * @property string $name
 * @property boolean $enable
 * @property integer $position
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Faq $faqs
 */
class FaqCategory extends Model
{
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function faqs()
    {
        return $this->belongsToMany(Faq::class);
    }
}
