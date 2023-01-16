<?php

namespace App\Http\Controllers;


use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public const IMAGE_LOCAL_STORAGE_PATH = 'public/uploads/imgs/';

    public function store(){
        //MAYBE GONNA IMPLEMENT IT LATER
    }

    public function get(int $id){
        if ($image = Image::where('id', $id)->first()) {
            dd($image);
            $response = Storage::response(ImageController::IMAGE_LOCAL_STORAGE_PATH.'/'.$image->storage_path);
            $response->headers->set('Cache-Control', 'public, max-age=86400');
            return $response;
        }

        return Response('Not found.', 404);
    }
}
