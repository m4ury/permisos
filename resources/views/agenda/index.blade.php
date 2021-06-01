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
            {{ Form::open(['method' => 'POST', 'class' => 'form-horizontal']) }}
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
    /*var Calendar = FullCalendar.Calendar;
    var calendarEl = $('#agenda');
    var calendar = new Calendar(calendarEl, {
        plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
        header    : {
            left  : 'prev,next today',
            center: 'title',
            right : 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        'themeSystem': 'bootstrap',
        //Random default events
        /!*events    : [
            {
                title          : 'All Day Event',
                start          : new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor    : '#f56954', //red
                allDay         : true
            },
            {
                title          : 'Long Event',
                start          : new Date(y, m, d - 5),
                end            : new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor    : '#f39c12' //yellow
            },
            {
                title          : 'Meeting',
                start          : new Date(y, m, d, 10, 30),
                allDay         : false,
                backgroundColor: '#0073b7', //Blue
                borderColor    : '#0073b7' //Blue
            },
            {
                title          : 'Lunch',
                start          : new Date(y, m, d, 12, 0),
                end            : new Date(y, m, d, 14, 0),
                allDay         : false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor    : '#00c0ef' //Info (aqua)
            },
            {
                title          : 'Birthday Party',
                start          : new Date(y, m, d + 1, 19, 0),
                end            : new Date(y, m, d + 1, 22, 30),
                allDay         : false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor    : '#00a65a' //Success (green)
            },
            {
                title          : 'Click for Google',
                start          : new Date(y, m, 28),
                end            : new Date(y, m, 29),
                url            : 'http://google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor    : '#3c8dbc' //Primary (light-blue)
            }
        ],*!/
        editable  : true,
        droppable : true, // this allows things to be dropped onto the calendar !!!
        drop      : function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        }
    });

    calendar.render();*/
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
