<?php

namespace App\Http\Controllers;

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
}

