<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('main_admin.*', ViewComposers\Admin\AdministeredCompanyComposer::class);
        View::composer('main_admin.*', ViewComposers\Admin\AdministerableShowcasesComposer::class);
        View::composer('main_admin.*', ViewComposers\Admin\AdministeredShowcaseComposer::class);
        View::composer('main_admin.roles.includes.settings', ViewComposers\Admin\AdminRoleSettingsComposer::class);
        View::composer('main_admin.staff.lists.modals.edit', ViewComposers\Admin\SuperAdminsCompaniesComposer::class);

        View::composer('main_theme.*', ViewComposers\Site\CurrentShowcaseComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
