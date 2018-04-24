<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShowcaseWidgetDescription
 * @package App\Models
 *
 * @property integer $id
 * @property integer $showcase_widgets_id
 * @property string $setting
 * @property string $other
 * @property integer $language_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @mixin \Eloquent
 */
class ShowcaseWidgetDescription extends Model
{
    protected $table = 'showcase_widget_descriptions';

    protected $guarded = [''];

    protected $casts =
        [
            'setting' => 'array',
        ];
}
