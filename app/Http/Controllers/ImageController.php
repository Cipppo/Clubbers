<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\userProPic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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

    public function getProPic($username){

    }
}
