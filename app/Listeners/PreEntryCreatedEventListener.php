<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Models\PreEntry;

class PreEntryCreatedEventListener
{
    /**
     * @param Admin $admin
     */
    public function handle(PreEntry $preEntry)
    {

    }
}