<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userProPic extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "user_pro_pic";

    protected $fillable = [
        'username',
        'URL', 
        'alt'
    ];
}
