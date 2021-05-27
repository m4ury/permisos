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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
</button>
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
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
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
                selectable: true,
                selectHelper: true,
                editable: true,
            });
            calendar.render();
          });
</script>
@endsection
@stop
