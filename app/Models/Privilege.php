<?php

namespace App\Models;

use App\Repositories\Date\DateableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Privilege
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property boolean $is_enabled
 * @property integer $author_id
 *
 * @property Admin $author
 *
 * @mixin \Eloquent
 */
class Privilege extends Model
{
    use DateableTrait;

    protected $appends = [
        'formatCreatedAt',
        'formatUpdatedAt',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Admin::class);
    }
}
