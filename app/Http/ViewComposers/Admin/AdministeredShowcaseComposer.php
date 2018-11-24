<?php

namespace App\Http\ViewComposers\Admin;

use App\Models\Showcase;
use Illuminate\View\View;

class AdministeredShowcaseComposer
{
    /**
     * @var Showcase $administeredShowcase
     */
    protected $administeredShowcase;

    /**
     * Create a new profile composer.
     */
    public function __construct()
    {
        $this->administeredShowcase = config('admin.hasAdministeredShowcaseParameter')
            ? config('admin.administeredShowcase')
            : null;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $administeredShowcase = $this->administeredShowcase;

        $view->with(compact('administeredShowcase'));
    }
}