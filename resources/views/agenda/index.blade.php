@extends('adminlte::page')
@section('title', 'agenda')
@section('content')
<div class="container">
  <div class="row">
    <h2 class="title">Agenda Sala Reuniones</h2>
    <div id="agenda">

    </div>
  </div>
  <hr>
  <div class="row my-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
      Nuevo evento
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ Form::open(['action' => '', 'method' => 'POST', 'class' => 'form-horizontal']) }}
            {!! Form::label('titulo_label', 'Descripcion del evento') !!} {!! Form::text('titulo', 'bla', ['class'
            => 'form-control', 'placeholder' => 'Descripcion breve de la reunion']) !!}

            {!! Form::label('inicio_label', 'Inicio') !!} {!! Form::text('start', 'bla', ['class'
            => 'form-control', 'id' => 'start']) !!}

            {!! Form::label('fin_label', 'Fin') !!} {!! Form::text('end', 'bla', ['class'
            => 'form-control', 'id' => 'end']) !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('agenda');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              locale: 'es',
              plugins: ['dayGrid','timeGrid','interaction', 'listWeek'],
              header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek'
              },

              dateClick: function(info){
                $('#evento').modal('show');
              },

            });
            calendar.render();
          });
</script>
@endsection
@stop
