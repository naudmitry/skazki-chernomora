<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AdSource
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property boolean $is_enabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @mixin \Eloquent
 */
class AdSource extends Model
{
    use SoftDeletes;
}
