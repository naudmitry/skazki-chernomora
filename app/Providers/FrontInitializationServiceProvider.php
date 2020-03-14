<?php

namespace App\Providers;

use App\Models\Showcase;
use App\Models\ShowcaseDomain;
use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class FrontInitializationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $host = \Request::getHost();

        /** @var ShowcaseDomain|null $showcaseDomain */
        $showcaseDomain = ShowcaseDomain::query()->where('name', $host)->first();

        $showcase = $showcaseDomain
            ? $showcaseDomain->showcase
            : Showcase::query()->where('domain', '=', $host)->first();

        if ($showcase) {
            config()->set([
                'front.showcase' => $showcase,
            ]);
        }

        if (!$showcase) {
            \Log::error('No showcase in db (' . $host . ')');
            abort(Response::HTTP_FORBIDDEN);
        }
    }

    public function register()
    {
    }
}
