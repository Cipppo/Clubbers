<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\likePostClubber;
use App\Models\User;
use App\Notifications\likeNotification;
use Illuminate\Support\Facades\Notification;

class likePostClubberController extends Controller
{
    public function store(Request $request){

        //Find previous like 
        $given = likePostClubber::where(['clubberId' => Auth::id(), 'postId' => $request->post_id])->first();

        if(isset($given)){
            $given->delete();
            return Response('DeleteLike.', 200);
        }


        $like = new likePostClubber();
        $like->postId = $request->post_id;
        $like->clubberId = Auth::id();
        $like->save();


        $postUser = postController::getPostUser($request->post_id);
        Notification::send(User::find($postUser), new likeNotification(Auth::user()));
        return Response('Success.', 200);

    }

    public function getStats($postId){
        $likes = likePostClubber::getPostLike($postId);

        if(Auth::check()){
            $userReaction = likePostClubber::where(['postId'=>$postId, 'clubberId'=>Auth::id()])->first();
            $userReactionRes = isset($userReaction) ? true : false;
            return response()->json([
                'likes'=> $likes,
                'userLike' => $userReactionRes,
            ]);
        }else{
            return response()->json([
                'likes'=> $likes
            ]);
        }

    }
}
