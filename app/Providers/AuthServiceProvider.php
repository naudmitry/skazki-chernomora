<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Custom user resolver for broadcasting auth route
         */
        $this->app->rebinding('request', function ($app, \Illuminate\Http\Request $request) {
            $request->setUserResolver(function ($guard = null) use ($app) {
                if (isset($guard)) {
                    return $app['auth']->guard($guard)->user();
                }

                foreach ([$guard, 'admin', 'web'] as $tryGuard) {
                    if ($user = $app['auth']->guard($tryGuard)->user()) {
                        return $user;
                    }
                }

                return $app['auth']->guard($guard)->user();
            });
        });
    }
}
