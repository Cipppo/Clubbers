<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create(){
        return view('User.logIn');
    }
 
    public function authenticate(Request $request){
        //dd($request);

        $messages = [
            'email' => 'Invalid email or password',
            'password' => 'Invalid email or password',
        ];

        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required', 'String'],
        ], $messages);
        
        if(Auth::attempt($credentials)){
            //$request->session()->regenerate();
            return redirect()->route('Feed.Home');
        }
    }

    public function logOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
