<?php

namespace App\Providers;

use App\Listeners;
use App\Models;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen =
        [
            'eloquent.creating: ' . Models\Company::class => [Listeners\CompanyCreatingEventListener::class],
            'eloquent.created: ' . Models\Company::class => [Listeners\CompanyCreatedEventListener::class],

            'eloquent.creating: ' . Models\Showcase::class => [Listeners\ShowcaseCreatingEventListener::class],
            'eloquent.created: ' . Models\Showcase::class => [Listeners\ShowcaseCreatedEventListener::class],

            'eloquent.creating: ' . Models\Admin::class => [Listeners\AdminCreatingEventListener::class],
            'eloquent.created: ' . Models\Admin::class => [Listeners\AdminCreatedEventListener::class, Listeners\AdminsCountEventListener::class],

            'eloquent.created: ' . Models\PreEntry::class => [Listeners\PreEntryCreatedEventListener::class],
        ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
