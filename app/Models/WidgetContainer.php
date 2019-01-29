<?php

namespace App;

use App\Models\ShowcaseWidget;
use App\Repositories\Showcase\ShowcasableInterface;
use App\Repositories\Showcase\ShowcasableTrait;
use Illuminate\Database\Eloquent\Model;

class WidgetContainer extends Model implements ShowcasableInterface
{
    use ShowcasableTrait;

    protected $table = 'widget_containers';

    /**
     * Has many items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(ShowcaseWidget::class, 'container_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function widgetable()
    {
        return $this->morphTo();
    }
}
