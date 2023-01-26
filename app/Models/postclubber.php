<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postclubber extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = 'postClubber';

    protected $fillable = [
        'caption', 
        'clubberUsername',
        'clubUsername',
    ];
}
