<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;
use App\Event;

class CalendarController extends Controller
{
    public function index(){
        $events = [];

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            new \DateTime('2020-07-21'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2020-07-21'), //end time (you can also use Carbon instead of DateTime)
        	0 //optionally, you can specify an event ID
        );
        
        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            false, //full day event?
            new \DateTime('2020-07-22 10:00'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2020-07-23 20:00'), //end time (you can also use Carbon instead of DateTime)
        	'stringEventId' //optionally, you can specify an event ID
        );
        
        $eloquentEvent = Event::first(); //EventModel implements Acaronlex\LaravelCalendar\Event
        
        $calendar = new Calendar();
        $calendar->addEvents($events)
        ->setOptions([
            'locale' => 'ru',
            'firstDay' => 0,
            'displayEventTime' => true,
            'selectable' => true,
            'initialView' => 'dayGridMonth',
            'headerToolbar' => [
                'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
            ],
            'buttonText' => [
              'today' => 'Сегодня',
              'month' => 'Месяц',
              'week' => 'Неделя',
              'day' =>  'День',
              'list' => 'Список'
            ],
            'editable' => true,
            'droppable' => true, // this allows things to be dropped onto the calendar
            
        ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){}',
            'drop' => 'function(info) { info.draggedEl.removeChild(info.draggedEl); }'
        ]);
        
        
        return view('calendar.index')->with([
            "pageTitle" => "Календарь",
            "calendar" => $calendar,
            'breadcrumbs' => [
                [
                    "url" => "/",
                    "title" => "HMH.EXPERT"
                ],
                [
                    "title" => "Календарь событий"
                ]
            ]
        ]);
    }
}
