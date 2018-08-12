<?php

namespace App\Models;

use App\Repositories\Slug\SlugableInterface;
use App\Repositories\Slug\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Faq
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property boolean $enable
 * @property boolean $favorite
 * @property string $answer
 * @property integer $view_count
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $author_id
 * @property integer $updater_id
 * @property-read \App\Models\FaqCategory $categories
 * @property-read \App\Models\Admin $author
 * @property-read \App\Models\Admin $updater
 */
class Faq extends Model implements SlugableInterface
{
    use SoftDeletes;
    use SlugableTrait;

    protected $with =
        [
            'categories',
            'author',
            'updater',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(FaqCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updater()
    {
        return $this->belongsTo(Admin::class);
    }
}
