<?php

namespace App\Models;

use App\Repositories\Showcase\ShowcasableTrait;
use App\Repositories\Slug\SlugableInterface;
use App\Repositories\Slug\SlugableTrait;
use App\Repositories\Widgets\WidgetableInterface;
use App\Repositories\Widgets\WidgetableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogArticle
 * @package App\Models
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $showcase_id
 * @property string $title
 * @property string $name
 * @property boolean $enable
 * @property boolean $favorite
 * @property string $link
 * @property string $content
 * @property integer $view_count
 * @property string $breadcrumbs
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $author_id
 * @property integer $updater_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\BlogCategory $categories
 * @property-read \App\Models\Admin $author
 * @property-read \App\Models\Admin $updater
 *
 * @mixin \Eloquent
 */
class Blog extends Model implements SlugableInterface, WidgetableInterface
{
    use SoftDeletes;
    use SlugableTrait;
    use ShowcasableTrait;
    use WidgetableTrait;

    protected $with =
        [
            'author'
        ];

    protected $appends =
        [
            'formatCreatedAt',
            'formatUpdatedAt'
        ];

    protected $dates =
        [
            'created_at',
            'updated_at'
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
