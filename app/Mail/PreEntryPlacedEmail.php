<?php

namespace App\Mail;

use App\Models\PreEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PreEntryPlacedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $preEntry;

    /**
     * Create a new message instance.
     *
     * @param $preEntry
     */
    public function __construct(PreEntry $preEntry)
    {
        $this->preEntry = $preEntry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('main_admin.mails.pre_entry.placed')
            ->subject('Черноморская сказка - Предварительная запись');
    }
}
