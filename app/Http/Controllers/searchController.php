<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    public static function search(Request $request){
        $username = $request->myInput;

        $id = Usercontroller::getIdByUsername($username);

        return redirect('/user/show/'.$id);
    }
}
