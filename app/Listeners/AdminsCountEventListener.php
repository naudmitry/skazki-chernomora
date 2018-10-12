<?php

namespace App\Listeners;

use App\Models\Admin;

class AdminsCountEventListener
{
    /**
     * @param Admin $admin
     */
    public function handle(Admin $admin)
    {
        $admin->company->stat_admins_count = $admin->company->admins()->count();
        $admin->company->save();
    }
}