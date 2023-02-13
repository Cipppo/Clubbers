<?php

namespace App\Http\Controllers;

use App\Models\terminatedEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TerminatedEventsController extends Controller
{
    

    public static function store($idClubber, $idEvento){
        terminatedEvents::create([
            'idClubber' => $idClubber, 
            'idEvento' => $idEvento,
        ]);
    }

    public static function getUserTerminatedEvents($id){
        $events = DB::table('terminate_events')->join('event_banner', 'event_banner.eventId', '=', 'terminate_events.idEvento')->join('events', 'event_banner.eventId', '=', 'events.id')
        ->where('terminate_events.idClubber', $id)->select('events.name as nomeEvento', 'events.id as eventId', 'event_banner.URL as URL', 'events.shortDescription as shortDescription',
        'events.Date as Date')->get();
        return $events;
    }   
}
