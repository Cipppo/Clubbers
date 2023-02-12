<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_club extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "post_club";

    protected $fillable = [
        'eventId', 
        'clubName', 
        'caption', 
    ];
}
