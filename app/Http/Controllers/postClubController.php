<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\post_club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class postClubController extends Controller
{
    public static function create(){
        return view("Posts.postClub");
    }

    public static function store(Request $request){
        $post = post_club::create([
            'clubName' => Auth::user()->username,
            'caption' => $request->caption,
            'eventId' => EventController::getIdByName($request->selectEvent),
        ]);

        ImageController::storePostClub($request, $post->id);
        
        post::create([
            'postId' => $post->id,
            'userId' => Auth::user()->id,
            'profileType' => "Club",
        ]);

        return redirect()->route('Feed.Home');

    }

    public static function getById($id){
        $post = DB::table("post_club")->where('id', $id)->first();
        return $post;
    }

    public static function getAll(){
        $posts = DB::table('post_club')->get();
        return $posts;
    }
}
