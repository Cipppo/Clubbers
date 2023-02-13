<?php

namespace App\Http\Controllers;

use App\Models\partecipa_evento;
use App\Models\event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PDO;

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
            if($event_full->onGoing == "True"){
                array_push($events, $event_full); //Fare la query per trovare l'evento e pusharlo
            }
        }
        return $events;
    }

    public static function getAuthenticatedUserFollowedEvents(){
        $followed = DB::table('partecipa_evento')->where('idClubber', Auth::id())->get();
        $events = array();
        foreach($followed as $event){
            $event_full = DB::table('events')->where('id', $event->idEvento)->first();
            if($event_full->onGoing == "True"){
                array_push($events, $event_full); //Fare la query per trovare l'evento e pusharlo
            }
        }
        return $events;
    }

    public static function getAuthUserNotOnGoingEvents(){
        $followed = DB::table('partecipa_evento')->where('idClubber', Auth::id())->get();
        $events = array();
        foreach($followed as $event){
            $event_full = DB::table('events')->where('id', $event->idEvento)->first();
            if($event_full->onGoing == "False"){
                array_push($events, $event_full);
            }
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

    public static function store(Request $request){
        $event = Event::create([
            'name' => $request->eventName,
            'description' => $request->longDescription,
            'clubName' => Auth::user()->username,
            'shortDescription' => $request->shortDescription,
            'Date' => $request->eventDay,
            'Time' => $request->eventTime,
            'onGoing' => "True",
        ]);

        ImageController::storeEventBanner($request, $event->id);

        return redirect()->route("Feed.Home");
    }

    public static function getCreatedEvents($clubName){
        $created = DB::table('events')->where('clubName', $clubName)->get();
        return $created;
    }

    public static function getIdByName($name){
        $id = DB::table('events')->where('name', $name)->first()->id;
        return $id;
    }

    public static function getClubNameById($id){
        $name = DB::table('events')->where('id', $id)->first()->clubName;
        return $name;
    }

    public static function getEventNameById($id){
        $event = DB::table('events')->where('id', $id)->first()->name;
        return $event;
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

    public static function getAllOnGoingClubEvents($clubName){
        $events = DB::table('events')->where('clubName', $clubName)->where('onGoing', 'True')->get();
        return $events;
    }

    public function getAllOnGoingAuthClubEvents(){
        $events = DB::table('events')->where('clubName', Auth::user()->username)->where('onGoing', 'True')->get();
        return $events;
    }

    public static function getAllNotOnGoingEvents($clubName){
        $events = DB::table('events')->where('clubName', $clubName)->where('onGoing', 'False')->get();
        return $events;
    }

    public static function isAuthPartecipating($idEvento){
        $partecipating = DB::table('partecipa_evento')->where('idclubber', Auth::user()->id)->where('idEvento', $idEvento)->first();
        if(isset($partecipating)){
            return 1;
        }else{
            return 0;
        }
    }

    public static function setPartecipation($eventId){
        partecipa_evento::create([
            'idClubber' => Auth::user()->id,
            'idEvento' => $eventId,
        ]);
        return 1;
    }

    public static function removePartecipation($eventId){
        DB::table('partecipa_evento')->where('idEvento',$eventId)->delete();
        return 1;
    }
}
