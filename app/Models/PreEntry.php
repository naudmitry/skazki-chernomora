<?php

namespace App\Models;

use App\Repositories\Showcase\ShowcasableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PreEntry
 * @package App\Models
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $showcase_id
 * @property string $full_name
 * @property string $phone_number
 * @property string $email
 * @property Carbon $desired_date
 * @property integer $salt_cave_id
 * @property string $type
 * @property string $message
 */
class PreEntry extends Model
{
    use SoftDeletes;
    use ShowcasableTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function saltCave()
    {
        return $this->belongsTo(SaltCave::class);
    }
}
