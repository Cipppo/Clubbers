<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\likePostClubber;

class likePostClubberController extends Controller
{
    public function store(Request $request){

        $like = new likePostClubber();
        $like->postId = $request->post_id;
        $like->clubberId = Auth::id();
        $like->save();

        //Ok il like funziona, adesso bisogna fare in modo di metterlo a tutti i post 
        //E fare l accendi e spegni
        
        return Response('Success.', 200);

    }
}
