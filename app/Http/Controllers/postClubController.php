<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\post_club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Notifications\postUpdateNotification;
use Illuminate\Support\Facades\Notification;

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

        $followers = followersController::getFollowers(Auth::user()->id);

        foreach($followers as $follower){
            Notification::send(User::find($follower->to), new postUpdateNotification(Auth::user()));
        }


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
