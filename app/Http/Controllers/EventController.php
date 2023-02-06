<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public static function getAll(){
        $events = DB::table('events')->get();
        return $events;
    }

    public static function getFollowedEvents($idClubber){
        $followed = DB::table('partecipa_evento')->where('idClubber', $idClubber)->get();
        $events = array();
        foreach($followed as $event){
            $event_full = DB::table('events')->where('id', $event->idEvento)->first();
            array_push($events, $event_full); //Fare la query per trovare l'evento e pusharlo
        }
        return $events;
    }
}
