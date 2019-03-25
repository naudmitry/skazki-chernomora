<?php

namespace App\Models;

use App\Repositories\Showcase\ShowcasableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AdSource
 * @package App
 *
 * @property integer $id
 * @property string $title
 * @property boolean $is_enabled
 * @property integer $company_id
 * @property integer $showcase_id
 *
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @mixin \Eloquent
 */
class AdSource extends Model
{
    use SoftDeletes;
    use ShowcasableTrait;

}
