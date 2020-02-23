<?php

namespace App\Listeners;

use App\Mail\PreEntryPlacedEmail;
use App\Models\PreEntry;
use Illuminate\Support\Facades\Mail;

class PreEntryCreatedEventListener
{
    public function handle(PreEntry $preEntry)
    {
        Mail::to("baterflai_salon@mail.ru")
            ->send(new PreEntryPlacedEmail($preEntry));
    }
}
