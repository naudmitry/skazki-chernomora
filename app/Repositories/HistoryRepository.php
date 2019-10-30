<?php

namespace App\Repositories;

use App\Models\History;
use App\Models\Showcase;

class HistoryRepository
{
    /**
     * @param Showcase $showcase
     * @param $entity
     * @param $event
     * @param $object
     */
    public function store(Showcase $showcase, $entity, $event, $object)
    {
        $history = new History();
        $history->entity_type = get_class($entity);
        $history->entity_id = $entity->id;
        $history->event = $event;
        $history->object_id = $object->id;
        $history->object_type = get_class($object);
        $history->showcase_id = $showcase->id;
        $history->author_id = \Auth::guard('admin')->user()->id;
        $history->save();
    }
}