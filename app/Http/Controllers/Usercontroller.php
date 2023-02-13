<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userProPic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


        ImageController::storeProPic($request);
        
        $user->save();


        return redirect()->route('Home.home');
    }
    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = DB::table("users")->where('id', $id)->first();
        return view('User.user', ['user' => $user]);
    }


    public static function getAddress($username){
        $via = DB::table('users')->where('username', $username)->first()->via;
        $comune = DB::table('users')->where('username', $username)->first()->comune;
        $regione = DB::table('users')->where('username', $username)->first()->regione;
        $cap = DB::table('users')->where('username', $username)->first()->CAP;

        return $via.","." ".$cap.","." ".$comune.","." ".$regione;
    }

    public static function getIdByUsername($username){
        $id = DB::table('users')->where('username', $username)->first()->id;
        return $id;
    }

    public static function getAllPosts($id){
        $user = DB::table('users')->where('id', $id)->first();
        $username = $user->username;
        
        $eventIds = array();
        $posts = DB::table('postClubber')->where('clubberUsername', $username)->get();
        foreach($posts as $post){
            array_push($eventIds, $post->eventId);
        }

        $res = array();

    
        $post = DB::table('postClubber')->join('event_banner','postClubber.eventId', '=', 'event_banner.eventId')->join('user_pro_pic', 'postClubber.clubberUsername', 'user_pro_pic.username')
        ->select('event_banner.URL as bannerUrl', 'user_pro_pic.URL as proPicUrl', 'postClubber.clubberUsername', 'postClubber.clubUsername', 'postClubber.caption as caption', 
        'postClubber.id as postId', 'event_banner.eventId')->join('users', 'users.username', '=', "postClubber.clubberUsername")->where('users.id', $id)->get();
        array_push($res, $post);
        
        return $res;
    }


    public static function getAllUsersNames(){
        $names = DB::table('users')->select('username')->get();

        return $names;
    }
}
