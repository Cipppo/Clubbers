<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ClubRegistrationController extends Controller
{
    
    

    public function create(){
        return view('Club.clubRegistration');
    }

    public function store(Request $request){
        $club = User::create([
            'username' => $request->username, 
            'type' => "Club",     
            'email' => $request->email, 
            'phone' => $request->phone, 
            'password' => bcrypt($request->password), 
            'via' => $request->street,
            'CAP' => $request->cap, 
            'comune' => $request->city, 
            'regione' => $request->state,
        ]);


        ImageController::storeProPic($request);
        //Store image
        //Save 
        //Redirect

        //$club->save();

        return redirect()->route("Home.home"); //Needs to be changed with the Feed Home
    

    }   
}
