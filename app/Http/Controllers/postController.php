<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{

    public static function getAll(){
        $followings = DB::table('followed')->where('from', Auth::user()->id)->get();

        $followings = $followings->toArray();
        $followingsArr = array();

        foreach($followings as $following){
            array_push($followingsArr, $following);
        }

        $posts = DB::table('post')->get();
        $outPosts = array();


        foreach($posts as $post){
            for($i = 0; $i < count($followingsArr); $i++){
                if($post->userId == $followingsArr[$i]->to){
                    array_push($outPosts, $post);
                }
            }
        }
        $postNew = array_reverse($outPosts);
        
        return $postNew;
    }

    public static function getPostUser($postId){
        $userId = DB::table('post')->where('postId', $postId)->first()->userId;
        return $userId;
    }


}
