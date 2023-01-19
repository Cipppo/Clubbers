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

    }
}
