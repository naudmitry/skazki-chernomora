<?php

namespace App\Models;

use App\Repositories\Date\DateableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Organization
 * @package App\Models
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $author_id
 * @property string $title
 * @property string $address
 */
class Organization extends Model
{
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
