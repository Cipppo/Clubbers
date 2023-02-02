<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class likePostClubber extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'like_post_clubber';

    protected $fillable = [
        'postId', 
        'clubberId'
    ];


    public static function getPostLike($postId){
        $likes = DB::table('like_post_clubber')->where('postId', $postId)->count();
        return $likes;
    }
}
