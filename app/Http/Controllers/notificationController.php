<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificationController extends Controller
{
    

    public static function show(){
        return view('notification.notifications');
    }



}

