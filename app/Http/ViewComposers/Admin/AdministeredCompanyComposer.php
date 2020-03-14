<?php

namespace App\Http\ViewComposers\Admin;

use App\Models\Company;
use Illuminate\View\View;

class AdministeredCompanyComposer
{
    /**
     * @var Company $administeredCompany
     */
    protected $administeredCompany;

    /**
     * Create a new profile composer.
     */
    public function __construct()
    {
        $this->administeredCompany = config('admin.administeredCompany');
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $administeredCompany = $this->administeredCompany;

        $view->with(compact('administeredCompany'));
    }
}
