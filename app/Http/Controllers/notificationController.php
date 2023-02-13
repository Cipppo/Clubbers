<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class notificationController extends Controller
{
    

    public static function show(){
        return view('notification.notifications');
    }

    public static function areThereNotification(){
        if(count(Auth::user()->unreadNotifications) > 0){
            return 1;
        }else{
            return 0;
        }
    }



}

