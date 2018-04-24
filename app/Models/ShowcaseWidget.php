<?php

namespace App\Models;

use App\WidgetContainer;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShowcaseWidget
 * @package App\Models
 *
 * @property int $id
 * @property boolean $action
 * @property int $position
 * @property-read WidgetContainer $container
 *
 * @mixin \Eloquent
 */
class ShowcaseWidget extends Model
{
    protected $table = 'showcase_widgets';

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function showcaseWidgetSettings()
    {
        return $this->hasOne(ShowcaseWidgetDescription::class, 'showcase_widgets_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function container()
    {
        return $this->belongsTo(WidgetContainer::class, 'container_id', 'id');
    }
}
