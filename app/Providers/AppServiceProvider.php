<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_ALL, 'ru_RU.utf8');
        Carbon::setLocale(config('app.locale'));

        \Validator::extend('domainname', \App\Validators\DomainName::class . '@validate');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        if (!\App::runningInConsole() && (\Request::getHost() !== env('DOMAIN_ADMIN'))) {
            $this->app->register(\App\Providers\FrontInitializationServiceProvider::class);
        }
    }
}
