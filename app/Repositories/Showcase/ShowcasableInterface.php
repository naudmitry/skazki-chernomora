<?php

namespace App\Repositories\Showcase;

interface ShowcasableInterface
{
    /**
     * @return Relations\BelongsTo
     */
    public function showcase();
}
