<?php

namespace App\Models;

use App\Repositories\Slug\SlugableInterface;
use App\Repositories\Slug\SlugableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @package App
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property boolean $enable
 * @property integer $position
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Blog $blogs
 */
class BlogCategory extends Model implements SlugableInterface
{
    use SoftDeletes;
    use SlugableTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    /**
     * @return int
     */
    public function getCountBlogs()
    {
        return $this->blogs()->where('enable', true)->count();
    }
}
