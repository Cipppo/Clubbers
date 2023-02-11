<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postClubController extends Controller
{
    public static function create(){
        return view("Posts.postClub");
    }
}
