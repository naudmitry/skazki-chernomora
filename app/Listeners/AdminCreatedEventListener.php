<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Models\Company;

class AdminCreatedEventListener
{
    /**
     * @param Admin $admin
     */
    public function handle(Admin $admin)
    {
        if ($admin->super && $admin->role->enable) {
            $admin->companies()->sync(Company::query()->where('super', false)->get());
        }
    }
}