<?php

namespace App\Repositories;

use App\Models\Buyer;
use App\Models\History;
use App\Models\Showcase;

class HistoryRepository
{
    /**
     * @param $entity
     * @param $event
     * @param Buyer $buyer
     * @param Showcase $showcase
     */
    public function store($entity, $event, Buyer $buyer, Showcase $showcase)
    {
        $history = new History();
        $history->entity_type = get_class($entity);
        $history->entity_id = $entity->id;
        $history->event = $event;
        $history->buyer_id = $buyer->id;
        $history->showcase_id = $showcase->id;
        $history->author_id = \Auth::guard('admin')->user()->id;
        $history->save();
    }
}