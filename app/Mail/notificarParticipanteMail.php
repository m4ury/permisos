<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Events\newReunionHasCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Listeners\notificarParticipanteListener;

class notificarParticipanteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reunion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reunion)
    {
        $this->reunion = $reunion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-reunion')->with('reunion');
    }
}
