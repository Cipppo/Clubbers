<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class followers extends Model
{
    use HasFactory;

    public $table = 'followers';
    public $timestamps = false;

    protected $fillable = [
        'from', 
        'to',
    ];
}
