<?php

namespace App\Listeners;

use App\Mail\PreEntryPlacedEmail;
use App\Models\PreEntry;
use Illuminate\Support\Facades\Mail;

class PreEntryCreatedEventListener
{
    public function handle(PreEntry $preEntry)
    {
        Mail::to("d.naumov@general-soft.by")
            ->send(new PreEntryPlacedEmail($preEntry));
    }
}