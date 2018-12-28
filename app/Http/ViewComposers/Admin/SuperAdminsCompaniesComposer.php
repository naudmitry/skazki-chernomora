<?php

namespace App\Http\ViewComposers\Admin;

use App\Models\Company;
use Illuminate\View\View;

class SuperAdminsCompaniesComposer
{
    public function compose(View $view)
    {
        $companies = Company::query()
            ->where('super', false)
            ->get();

        $view->with(compact('companies'));
    }
}