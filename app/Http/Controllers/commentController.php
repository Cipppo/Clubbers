<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Notifications\commentNotification;
use Illuminate\Support\Facades\Notification;



class commentController extends Controller
{
    public static function getPostComments($postId){
        $comments = DB::table('comment')->where('postId', $postId)->get();
        return $comments;
    }

    public static function store(Request $request){
        $comment = comment::create([
            'caption' => $request->caption,
            'clubberUsername' => Auth::user()->username,
            'postId' => $request->postId,
        ]);


        $postUser = postController::getPostUser($request->postId);
        Notification::send(User::find($postUser), new commentNotification(Auth::user()));

        
        return response(200);
    }
}
