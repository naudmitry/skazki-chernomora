<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    public function register()
    {
        parent::register();

        $this->app->bind('url', function ($app) {
            return new \App\Classes\Routing\UrlGenerator($app->make('router')->getRoutes(), $app->make('request'));
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapWebAdminRoutes();

        $this->mapWebAdminAuthRoutes();

        $this->mapWebShowcasesRoutes();

        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "web-admin-auth" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc and RedirectIfNotAdmin before SubstituteBindings.
     *
     * @return void
     */
    protected function mapWebAdminAuthRoutes()
    {
        Route::middleware('web-admin-auth')
            ->namespace($this->namespace)
            ->group(base_path('routes/web-admin-auth.php'));
    }

    protected function mapWebAdminRoutes()
    {
        Route::middleware('web-admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/web-admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebShowcasesRoutes()
    {
        Route::group(
            [
                'middleware' => 'web',
                'namespace' => $this->namespace,
            ],
            function ($router) {
                require base_path('routes/web-site.php');
            }
        );
    }
}
