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
 * @property string $breadcrumbs
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $author_id
 * @property integer $updater_id
 * @property integer $category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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

    protected $appends =
        [
            'formatCreatedAt',
            'formatUpdatedAt'
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(PageCategory::class, 'id', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->hasOne(Admin::class, 'id', 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function updater()
    {
        return $this->hasOne(Admin::class, 'id', 'updater_id');
    }

    /**
     * @param int $value
     */
    public function incrementViewsCount($value = 1)
    {
        self::where('id', $this->id)->increment('view_count', $value);
    }

    /**
     * @return string
     */
    public function getFormatCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    /**
     * @return string
     */
    public function getFormatUpdatedAtAttribute()
    {
        return $this->updated_at->format('d/m/Y H:i');
    }
}
