<?php

namespace App\Providers;

use App\Http\ViewComposers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        View::composer([
            'miracle.*',
            'miracle.widgets.*.front',
        ], ViewComposers\Site\CurrentShowcaseComposer::class);

        View::composer([
            'miracle.blog.*',
            'miracle.faq.*',
            'miracle.vendor.*'
        ], ViewComposers\Site\WidgetsPositionComposer::class);
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
