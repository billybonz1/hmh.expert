@extends('website.website')

@section('head')
    
    <link rel="stylesheet" href="https://unpkg.com/fullcalendar@5.1.0/main.min.css"/>
    <link rel="stylesheet" href="/styles/calendar.css"/>
@endsection


@section('content')
        @include('layouts._breadcrumbs')
        <div class="calendar-container">
            <div class="inner">
                <div class="full-calendar">
                    <h1>Календарь событий</h1>
                    @include('partials.alerts')
                    
                    {!! $calendar->calendar() !!}
                </div>
                
            </div>
        </div>
@endsection


@section('scripts')
    <script src="https://unpkg.com/fullcalendar@5.1.0/main.min.js"></script>
    <script>
    
        document.addEventListener('DOMContentLoaded', function() {
          var Calendar = FullCalendar.Calendar;
          var Draggable = FullCalendar.Draggable;
        
          var calendarEl = document.getElementById('calendar-{!! $calendar->getId() !!}');
        
          // initialize the external events
          // -----------------------------------------------------------------
        
          new Draggable(calendarEl, {
            itemSelector: '.fc-event',
            eventData: function(eventEl) {
              return {
                title: eventEl.innerText
              };
            }
          });
        
          // initialize the calendar
          // -----------------------------------------------------------------
        
          var calendar = new Calendar(calendarEl, {!! $calendar->getOptionsJson() !!});
        
          calendar.render();
        });
    </script>
@endsection