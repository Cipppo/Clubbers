<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        $user = new User();
        $this->storeImage($request);
        dd($request);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->birth = $request->birth;
        $user->city = $request->city;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->username = $request->username;
        $user->save();

        return redirect()->route('Home.home');
    }

    public function storeImage(Request $request){

        $IMAGE_UPLOAD_URL='public/uploads/imgs/proPics';

        $file = $request->hasfile('propicChooser');
        if($file){
            $newFile = $request->file('propicChooser');
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
