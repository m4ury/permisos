@extends('adminlte::page')
@section('title', 'agenda')
@section('content')
<div class="container">
    <div class="row">
        <h2 class="title">Agenda Sala Reuniones</h2>
        <div id="agenda">

        </div>
    </div>
</div>
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('agenda');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              plugins: ['dayGrid', 'timeGrid', 'interaction'],
              locale: 'es',
              initialView: 'dayGridMonth'
            });
            calendar.render();
          });
</script>
@endsection
@stop
