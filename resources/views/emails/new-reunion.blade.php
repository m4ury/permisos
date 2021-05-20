@component('mail::message')
    Estimados (as)
    @foreach($reunion->users()->pluck('name') as $name)
        {{  $name}},
    @endforeach
    Ha(n) sido invitados a la siguiente reunión <strong>{{ strtoupper($reunion->titulo_reunion) }}.</strong><br>
    Programada para el día <strong>{{ Carbon\Carbon::parse($reunion->dia_reunion)->format("d") }} de {{ Carbon\Carbon::create($reunion->dia_reunion)->locale("es")->monthName }} del año {{ Carbon\Carbon::parse($reunion->dia_reunion)->format("Y") }}</strong>
    la cual esta programada como se detalla a continuación:
    Hora inicio <strong>{{ $reunion->inicio_reunion }} - </strong>
    Hora termino <strong>{{ $reunion->fin_reunion }}</strong>, esta se realizará en {{ $reunion->observaciones_reunion }}


    Importante.
    No responda este correo, fue generado de manera automatica.

    Atentamente.
@endcomponent