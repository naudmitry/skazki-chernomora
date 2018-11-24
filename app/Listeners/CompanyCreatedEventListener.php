<?php

namespace App\Listeners;

use App\Classes\AdminComponentEnum;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class CompanyCreatedEventListener
{
    public function handle(Company $company)
    {
        if (!$company->super) {
            $admins = Admin::query()
                ->where('super', true)
                ->whereHas('role', function (Builder $query) {
                    $query->where('enable', true);
                })
                ->get();

            foreach ($admins as $admin) {
                $admin->companies()->attach($company->id);
            }
        }

        $adminRole = new Role;
        $adminRole->super = $company->super ?: false;
        $adminRole->company()->associate($company);
        $adminRole->title = $company->super ? 'Super-administrator' : 'Administrator';
        $adminRole->components = array_values($company->super ? AdminComponentEnum::listsSuper() : AdminComponentEnum::listsCompany());
        $adminRole->enable = true;
        $adminRole->save();
    }
}