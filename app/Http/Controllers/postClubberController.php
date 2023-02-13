<?php

namespace App\Http\Controllers;

use App\Models\post;
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

    public static function show($id){
        $post = DB::table('postClubber')->where('id', $id)->first();
        return view("Posts.postOpen", ['post' =>$post]);
    }

    public static function getById($id){
        $post = DB::table('postClubber')->where('id', $id)->first();
        return $post;
    }

    public function store(Request $request){
        $postClubber = postclubber::create([
            'caption' => $request->caption,
            'eventId' => EventController::getIdByName($request->selectEvent),
            'clubberUsername' => Auth::user()->username, 
            'clubUsername' => EventController::getClubNameById(EventController::getIdByName($request->selectEvent)),
        ]);
        $postClubber->save();
        EventController::removePartecipation(EventController::getIdByName($request->selectEvent));
        ImageController::storePost($request);

        post::create([
            'postId' => $postClubber->id,
            'profileType' => "Clubber",
        ]);


        return redirect()->route("Feed.Home");
    }
}

