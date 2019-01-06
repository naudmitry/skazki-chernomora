<?php

namespace App\Models;

use App\Repositories\Showcase\ShowcasableTrait;
use App\Repositories\Slug\SlugableInterface;
use App\Repositories\Slug\SlugableTrait;
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
 */
class Blog extends Model implements SlugableInterface
{
    use SoftDeletes;
    use SlugableTrait;
    use ShowcasableTrait;

    protected $with =
        [
            'author'
        ];

    protected $appends =
        [
            'formatCreatedAt',
            'formatUpdatedAt'
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
     * @param $text
     * @param int $length
     * @return null|string|string[]
     */
    function reduction($text, $length = 70)
    {
        if (mb_strlen($text, 'UTF-8') > $length) {
            $substr = mb_substr($text, 0, $length, 'UTF-8');

            $text = strpos($substr, ' ') !== false
                ? preg_replace('~(\s)?(?(1)\S+$|\s$)~', '', $substr)
                : strstr($text, ' ', true);

            $text .= ' ... ';
        }

        return $text;
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
