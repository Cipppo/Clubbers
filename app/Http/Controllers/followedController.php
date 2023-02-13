<?php

namespace App\Http\Controllers;

use App\Models\followed;
use App\Models\followers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class followedController extends Controller
{
    
    public static function amIFollowing($id){
        $res = DB::table('followed')->where('from', Auth::user()->id)->where('to', $id)->first();
        if(isset($res)){
            return 1;
        }else{
            return 0;
        }
    }

    public static function countFollowed($id){
        $res = DB::table('followed')->where('from', $id)->get()->count();
        return $res;
    }

    public static function startFollowing($id){
        $follow = followed::create([
            'from' => Auth::user()->id,
            'to' => $id,
        ]);

        $follower = followers::create([
            'from' => $id,
            'to' => Auth::user()->id,
        ]);

        $follow->save();
        $follower->save();
        return $follow;
    }

    public static function removeFollow($id){
        DB::table('followed')->where('from', Auth::user()->id)->where('to', $id)->delete();
        DB::table('followers')->where('from', $id)->where('to', Auth::user()->id)->delete();

        return response(200);
    }
}
