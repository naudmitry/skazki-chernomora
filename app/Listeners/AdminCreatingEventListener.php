<?php

namespace App\Listeners;

use App\Models\Admin;

class AdminCreatingEventListener
{
    /**
     * @param Admin $admin
     */
    public function handle(Admin $admin)
    {
        $admin->super = $admin->company->super;
    }
}
