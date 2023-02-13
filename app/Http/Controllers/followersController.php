<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class followersController extends Controller
{
    public static function countFollowers($id){
        $res = DB::table('followers')->where('from', $id)->get()->count();
        return $res;
    }
}
