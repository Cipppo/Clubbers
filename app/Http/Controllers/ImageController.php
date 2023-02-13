<?php

namespace App\Http\Controllers;

use App\Models\foto_post_club;
use App\Models\Image;
use App\Models\event_banner;
use App\Models\postclubber;
use App\Models\userProPic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\foto_post_clubber;

class ImageController extends Controller
{
    public static function storeProPic(Request $request){
        $IMAGE_UPLOAD_URL = 'images/proPics/';

        $file = $request->hasfile('fileIn');
        if($file){
            $newFile = $request->file('fileIn')->getClientOriginalName();
            $request->file('fileIn')->move(public_path($IMAGE_UPLOAD_URL), $newFile);
            $userPic = userProPic::create([
                'username' => $request->username,
                'URL' => $IMAGE_UPLOAD_URL.$newFile,
                'alt' => $request->username." Profile Avatar",
            ]);
            $userPic->save();
        }
    }

    public static function storePost(Request $request){

        $POST_UPLOAD_URL = 'images/Posts/';

        $files = $request->fileIn;
        foreach($files as $file){
            if($file){
                $fileName = $file->getClientOriginalName();
                $file->move(public_path($POST_UPLOAD_URL), $fileName);
                $pic = foto_post_clubber::create([
                    'username' => Auth::user()->username,
                    'eventName' => $request->selectEvent,
                    'URL' => $POST_UPLOAD_URL.$fileName,
                    'alt' => Auth::user()->username."_".$request->selectEvent."_post",
                ]);
                $pic->save();
            }
        }
    }

    public static function storePostClub(Request $request, $postId){
        $POST_UPLOAD_URL = 'images/Posts/';

        $file = $request->hasFile('fileIn');
        if($file){
            $newFile = $request->file('fileIn')->getClientOriginalName();
            $request->file('fileIn')->move(public_path($POST_UPLOAD_URL), $newFile);
            foto_post_club::create([
                'postId' => $postId,
                'URL' => $POST_UPLOAD_URL.$newFile,
                'alt' => Auth::user()->username."_".$request->selectEvent."_post",
            ]);
        }
    }

    public static function storeEventBanner(Request $request, $eventId){
        $BANNER_UPLOAD_URL = 'images/Banners/';

        $file = $request->hasFile('fileIn');
        if($file){
            $newFile = $request->file('fileIn')->getClientOriginalName();
            $request->file('fileIn')->move(public_path($BANNER_UPLOAD_URL), $newFile);
            event_banner::create([
                'eventId' => $eventId,
                'URL' => $BANNER_UPLOAD_URL.$newFile,
                'alt' => $request->eventName."_"."banner",
            ]);
        }
    }

    public static function getPostClubberPics($clubberUsername, $eventName){
        $pics = DB::table('foto_post_clubber')->where('username', $clubberUsername)->where('eventName', $eventName)->get();
        return $pics;
    }

    public static function getProPic($username){
        $url = DB::table('user_pro_pic')->where('username', $username)->first()->URL;
        return $url;
    }

    public static function getProPicAlt($username){
        $alt = DB::table('user_pro_pic')->where('username', $username)->first()->alt;
        return $alt;
    }

    public static function getBannerUrl($eventId){
        $url = DB::table('event_banner')->where('eventId', $eventId)->first()->URL;
        return $url;
    }

    public static function getbannerAlt($eventId){
        $alt = DB::table('event_banner')->where('eventId', $eventId)->first()->alt;
        return $alt;
    }

    public static function getPostClubImage($postId){
        $pic = DB::table('foto_post_club')->where('postId', $postId)->first()->URL;
        return $pic;
    }

    public static function getPostClubAlt($postId){
        $alt = DB::table('foto_post_club')->where('postId', $postId)->first()->alt;
        return $alt;
    }

}
