<?php

namespace App\Http\Controllers;

use App\Models\postclubber;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class postClubberController extends Controller
{
    public static function getAllbyUsername($clubberUser){
        $posts = DB::table('postClubber')->where('clubberUsername', $clubberUser)->get();
        return $posts;
    }

    public static function getAll(){
        $posts = DB::table('postClubber')->get();
        return $posts;
    }

    public function create(){
        return view("Posts.postCreate");
    }

    public function store(Request $request){
        $postClubber = postclubber::create([
            'caption' => $request->caption,
            'eventId' => EventController::getIdByName($request->selectEvent),
            'clubberUsername' => Auth::user()->username, 
            'clubUsername' => EventController::getClubNameById(EventController::getIdByName($request->selectEvent)),
        ]);
        $postClubber->save();
        EventController::delete_partecipation(EventController::getIdByName($request->selectEvent));
        ImageController::storePost($request);
        return redirect()->route("Feed.Home");
    }
}

