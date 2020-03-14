<?php
namespace App\Listeners;

use App\Models\Admin;
use App\Models\Role;
use App\Models\Showcase;

class ShowcaseCreatedEventListener
{
    public function handle(Showcase $showcase)
    {
        /** @var Role $adminRole */
        $adminRole = $showcase->company->roles()->where('enable', true)->first();

        /** @var Admin[] $admins */
        $admins = $showcase->company->admins()->where('role_id', $adminRole->id)->get();

        foreach ($admins as $admin) {
            $admin->showcases()->save($showcase);
        }
    }
}
