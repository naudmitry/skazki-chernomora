<?php

namespace App\Repositories\Widgets;

use App\WidgetContainer;

trait WidgetableTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function widgetContainer()
    {
        return $this->belongsTo(WidgetContainer::class, 'widget_container_id', 'id');
    }
}