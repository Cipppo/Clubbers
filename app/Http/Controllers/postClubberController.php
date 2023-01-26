<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class postClubberController extends Controller
{
    public static function getAll($clubberUser){
        $posts = DB::table('postClubber')->where('clubberUsername', $clubberUser)->get();
        return $posts;
    }
}
