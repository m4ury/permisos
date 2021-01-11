<?php

namespace App\Listeners;

use App\Events\ReunionCreada;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificarParticipante
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ReunionCreada  $event
     * @return void
     */
    public function handle(ReunionCreada $event)
    {
        $reunion = $event->reunion;

        foreach ($reunion->users->email as $email){
            Mail::send('emails.reuniones.reunion', ['reunion' => $reunion], function($mail) use($reunion){
                $mail
                    ->to($email)
                    ->subject('Invitacion a reunion '.$reunion->titulo_reunion);
            });
        }
    }
}
