<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository
{
    /**
     * @param Admin|null $admin
     * @param $data
     * @return Admin
     */
    public function save(Admin $admin = null, $data)
    {
        if (!isset($admin)) {
            $admin = new Admin();
        }

        $admin->name = array_get($data, 'name');
        $admin->surname = array_get($data, 'surname');
        $admin->position = array_get($data, 'position');
        $admin->phone = array_get($data, 'phone');
        $admin->email = array_get($data, 'email');
        $admin->save();

        return $admin;
    }
}