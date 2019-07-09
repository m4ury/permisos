<?php

namespace App\Listeners;

use App\Events\SalidaFueCreada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NotificarSolicitante
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
     * @param  SalidaFueCreada  $event
     * @return void
     */
    public function handle(SalidaFueCreada $event)
    {
        $salida = $event->salida;

        Mail::send('emails.salidas.solicitante', ['salida' => $salida], function($mail) use($salida){
            $mail
            ->to($salida->user->email)
            ->subject('Solicitud Salida Especial N° '.$salida->id);
        });
    }
}