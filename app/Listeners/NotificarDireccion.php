<?php

namespace App\Listeners;

use App\Events\SalidaFueCreada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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

        Mail::send('emails.salidas', ['msg' => $salida], function($m) use($salida){
            $m->to('mauriciomorales0410@gmail.com')->subject('Se ha generado una nueva Salida Especial N° '.$salida->id);
        });
    }
}
