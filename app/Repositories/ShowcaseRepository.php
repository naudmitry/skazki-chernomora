<?php

namespace App\Repositories;

use App\Models\Showcase;

class ShowcaseRepository
{
    protected $showcase;

    /**
     * ShowcaseRepository constructor.
     * @param Showcase $showcase
     */
    public function __construct(Showcase $showcase)
    {
        $this->showcase = $showcase;
    }

    /**
     * @param Showcase $showcase
     * @return $this
     */
    public function setShowcase(Showcase $showcase)
    {
        $this->showcase = $showcase;

        return $this;
    }
}