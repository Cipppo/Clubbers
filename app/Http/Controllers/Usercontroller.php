<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{

    public const IMAGE_UPLOAD_URL = 'public/uploads/imgs/proPics';
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('User.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'type' => "User",
            'name' => $request->name, 
            'surname' => $request->surname, 
            'birth' => $request->birth, 
            'city' => $request->city, 
            'email' => $request->email, 
            'phone' => $request->phone, 
            'password' => bcrypt($request->password), 
            'username' => $request->username,
        ]);
        $this->storeImage($request);
        
        $user->save();


        return redirect()->route('Home.home');
    }

    public function storeImage(Request $request){

        $IMAGE_UPLOAD_URL='public/uploads/imgs/proPics';

        $file = $request->hasfile('choose-file');
        if($file){
            //TODO: Need to fix the file upload
            $newFile = $request->file('choose-file');
            $newFile->storeAs($IMAGE_UPLOAD_URL, $request->name."_propic.png");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show(string $name)
    {

    }
}
