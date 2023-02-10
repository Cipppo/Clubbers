<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

    public static function getAuthenticatedUserFollowedEvents(){
        $followed = DB::table('partecipa_evento')->where('idClubber', Auth::id())->get();
        $events = array();
        foreach($followed as $event){
            $event_full = DB::table('events')->where('id', $event->idEvento)->first();
            array_push($events, $event_full); //Fare la query per trovare l'evento e pusharlo
        }
        return $events;
    }

    public static function show($id){
        $event = DB::table('events')->where('id', $id)->first();
        return view('Event.EventPage', ['event' => $event]);
    }

    public static function create(){
        return view('Event.EventCreate');
    }



    public static function getIdByName($name){
        $id = DB::table('events')->where('name', $name)->first()->id;
        return $id;
    }

    public static function getClubNameById($id){
        $name = DB::table('events')->where('id', $id)->first()->clubName;
        return $name;
    }

    public static function delete_partecipation($id){
        DB::table('partecipa_evento')->where('idEvento',$id)->delete();
    }

    public static function getEventsbyDate($date){
        $dateref = str_replace("-", "/", $date);
        $events = DB::table('events')->where('Date', $dateref)->get();
        if(isset($events)){
            return $events;
        }else{
            return 0;
        }
    }

    public static function isEvent($date){
        $dateref = str_replace("-", "/", $date);
        $events = DB::table('events')->where('Date', $dateref)->first();
        if(isset($events)){
            return 1;
        }else{
            return 0;
        }
    }
}
