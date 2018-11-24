<?php

namespace App\Listeners;

use App\Models\Showcase;

class ShowcaseCreatingEventListener
{
    public function handle(Showcase $showcase)
    {
        $showcase->slug = strtolower(str_random(5));
    }
}