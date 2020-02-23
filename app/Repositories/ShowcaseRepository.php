<?php

namespace App\Repositories;

use App\Models\Showcase;
use App\Models\ShowcaseDomain;

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

    /**
     * @param $domainArray
     * @throws \Throwable
     */
    public function syncDomains($domainArray)
    {
        \DB::transaction(function () use ($domainArray) {
            $this->showcase->domains()->delete();

            foreach ($domainArray as $domainItem) {
                $this->showcase->domains()->create(['name' => $domainItem]);
            }
        });
    }

    /**
     * @param $hostname
     * @return Showcase|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function getShowcaseByHostname($hostname)
    {
        /** @var ShowcaseDomain|null $showcaseDomain */
        $showcaseDomain = ShowcaseDomain::query()->where('name', $hostname)->first();

        /** @var Showcase $showcase */
        return $showcaseDomain
            ? $showcaseDomain->showcase
            : Showcase::where('domain', $hostname)->first();
    }
}
