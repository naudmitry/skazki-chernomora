<?php

namespace App\Models;

use App\Repositories\Slug\SlugableInterface;
use App\Repositories\Slug\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Page
 * @package App\Models
 *
 * @property integer $id
 * @property string $static_page_type
 * @property string $type
 * @property string $title
 * @property string $name
 * @property string $content
 * @property boolean $enable
 * @property integer $view_count
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $author_id
 * @property integer $updater_id
 * @property integer $category_id
 * @property-read \App\Models\PageCategory $category
 * @property-read \App\Models\Admin $author
 * @property-read \App\Models\Admin $updater
 */
class Page extends Model implements SlugableInterface
{
    use SoftDeletes;
    use SlugableTrait;

    protected $with =
        [
            'category',
            'author',
            'updater',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(PageCategory::class, 'id', 'category_id');
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
