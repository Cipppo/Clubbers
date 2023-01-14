<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
        return view('User.logIn');
    }

    public function handleLogin(Request $request){
        dd($request);
    }
}
