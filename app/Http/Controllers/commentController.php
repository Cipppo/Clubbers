<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        
        return response(200);
    }
}
