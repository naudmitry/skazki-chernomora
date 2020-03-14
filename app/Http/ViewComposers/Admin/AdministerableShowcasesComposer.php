<?php

namespace App\Http\ViewComposers\Admin;

use App\Models\Showcase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class AdministerableShowcasesComposer
{
    /**
     * @var Showcase[]|Collection $administerableShowcases
     */
    protected $administerableShowcases;

    /**
     * Create a new profile composer.
     */
    public function __construct()
    {
        $this->administerableShowcases = config('admin.administerableShowcases');
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $administerableShowcases = $this->administerableShowcases;

        $view->with(compact('administerableShowcases'));
    }
}
