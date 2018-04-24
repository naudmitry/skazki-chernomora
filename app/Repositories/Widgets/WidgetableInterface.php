<?php

namespace App\Repositories\Widgets;

interface WidgetableInterface
{
    /**
     * Belongs to showcase
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function widgetContainer();
}
