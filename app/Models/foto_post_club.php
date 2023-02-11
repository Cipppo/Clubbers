<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto_post_club extends Model
{
    use HasFactory;

    public $table = 'foto_post_club';
    public $timestamps = false;

    protected $fillable = [
        'postId', 
        'URL', 
        'alt',
    ];
}
