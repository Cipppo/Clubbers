<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class ClubRegistrationController extends Controller
{
    
    

    public function create(){
        return view('Club.clubRegistration');
    }

    public function store(Request $request){
        $club = User::create([
            'name' => $request->name, 
            'type' => "Club",     
            'email' => $request->email, 
            'phone' => $request->phone, 
            'password' => bcrypt($request->password), 
            'via' => $request->street,
            'CAP' => $request->cap, 
            'comune' => $request->city, 
            'regione' => $request->state,
        ]);


        $this->storeImage($request);
        //Store image
        //Save 
        //Redirect

        //$club->save();

        return redirect()->route("Home.home"); //Needs to be changed with the Feed Home
    

    }   

    public function storeImage(Request $request){
        $IMAGE_UPLOAD_URL='public/uploads/imgs/proPics';

        $file = $request->hasFile('choose-file');
        if($file){
            $newFile = $request->file('choose-file');
            $newFile->storeAs($IMAGE_UPLOAD_URL, $request->name."_propic.png");        
        }
    }
}
