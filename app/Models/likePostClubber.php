<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likePostClubber extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'like_post_clubber';

    protected $fillable = [
        'postId', 
        'clubberId'
    ];
}
