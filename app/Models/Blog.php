<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogArticle
 * @package App\Models
 *
 * @property string $title
 * @property string $name
 * @property boolean $enable
 * @property string $content
 * @property integer $view_count
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $author_id
 * @property integer $updater_id
 * @property-read \App\Models\BlogCategory $categories
 * @property-read \App\Models\Admin $author
 * @property-read \App\Models\Admin $updater
 */
class Blog extends Model
{
    use SoftDeletes;

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
        return $this->belongsToMany(BlogCategory::class);
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
