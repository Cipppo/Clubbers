<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{

    public static function getAll(){
        $posts = DB::table('post')->get();
        $postNew = $posts->reverse();
        return $postNew;
    }


}
