<?php

namespace App\Listeners;

use App\Models\Company;

class CompanyCreatingEventListener
{
    public function handle(Company $company)
    {
        $company->slug = $company->super ? 'super' : strtolower(str_random(5));
    }
}
