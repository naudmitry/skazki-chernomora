<?php

namespace App\Models;

use App\Repositories\Date\DateableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AdSource
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property boolean $is_enabled
 * @property integer $author_id
 * @property integer $sort
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @mixin \Eloquent
 */
class AdSource extends Model
{
    use SoftDeletes;
    use DateableTrait;

    protected $appends = [
        'formatCreatedAt',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Admin::class);
    }
}
