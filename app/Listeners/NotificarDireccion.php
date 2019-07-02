<?php

namespace App\Listeners;

use App\Events\SalidaFueCreada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class NotificarDireccion
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

        Mail::send('emails.salidas.direccion', ['salida' => $salida], function($m) use($salida){
            $m
            ->to('mmoraless@ssmaule.cl')
            ->subject('Solicitud Salida Especial N° '.$salida->id);
        });
    }
}
